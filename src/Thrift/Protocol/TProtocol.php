<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Protocol;

use OpenSearch\Thrift\Exception\TProtocolException;
use OpenSearch\Thrift\Type\TType;

/**
 * Protocol base class module.
 */
abstract class TProtocol
{
    /**
     * Underlying transport.
     *
     * @var TTransport
     */
    protected $trans_;

    /**
     * Constructor.
     * @param mixed $trans
     */
    protected function __construct($trans)
    {
        $this->trans_ = $trans;
    }

    /**
     * Accessor for transport.
     *
     * @return TTransport
     */
    public function getTransport()
    {
        return $this->trans_;
    }

    /**
     * Writes the message header.
     *
     * @param string $name Function name
     * @param int $type message type TMessageType::CALL or TMessageType::REPLY
     * @param int $seqid The sequence id of this message
     */
    abstract public function writeMessageBegin($name, $type, $seqid);

    /**
     * Close the message.
     */
    abstract public function writeMessageEnd();

    /**
     * Writes a struct header.
     *
     * @param string $name Struct name
     * @return int How many bytes written
     * @throws TException on write error
     */
    abstract public function writeStructBegin($name);

    /**
     * Close a struct.
     *
     * @return int How many bytes written
     * @throws TException on write error
     */
    abstract public function writeStructEnd();

    /*
     * Starts a field.
     *
     * @param string     $name Field name
     * @param int        $type Field type
     * @param int        $fid  Field id
     * @throws TException on write error
     * @return int How many bytes written
     */
    abstract public function writeFieldBegin($fieldName, $fieldType, $fieldId);

    abstract public function writeFieldEnd();

    abstract public function writeFieldStop();

    abstract public function writeMapBegin($keyType, $valType, $size);

    abstract public function writeMapEnd();

    abstract public function writeListBegin($elemType, $size);

    abstract public function writeListEnd();

    abstract public function writeSetBegin($elemType, $size);

    abstract public function writeSetEnd();

    abstract public function writeBool($bool);

    abstract public function writeByte($byte);

    abstract public function writeI16($i16);

    abstract public function writeI32($i32);

    abstract public function writeI64($i64);

    abstract public function writeDouble($dub);

    abstract public function writeString($str);

    /**
     * Reads the message header.
     *
     * @param string $name Function name
     * @param int $type message type TMessageType::CALL or TMessageType::REPLY
     * @param mixed $seqid
     * @parem int $seqid The sequence id of this message
     */
    abstract public function readMessageBegin(&$name, &$type, &$seqid);

    /**
     * Read the close of message.
     */
    abstract public function readMessageEnd();

    abstract public function readStructBegin(&$name);

    abstract public function readStructEnd();

    abstract public function readFieldBegin(&$name, &$fieldType, &$fieldId);

    abstract public function readFieldEnd();

    abstract public function readMapBegin(&$keyType, &$valType, &$size);

    abstract public function readMapEnd();

    abstract public function readListBegin(&$elemType, &$size);

    abstract public function readListEnd();

    abstract public function readSetBegin(&$elemType, &$size);

    abstract public function readSetEnd();

    abstract public function readBool(&$bool);

    abstract public function readByte(&$byte);

    abstract public function readI16(&$i16);

    abstract public function readI32(&$i32);

    abstract public function readI64(&$i64);

    abstract public function readDouble(&$dub);

    abstract public function readString(&$str);

    /**
     * The skip function is a utility to parse over unrecognized date without
     * causing corruption.
     *
     * @param TType $type What type is it
     */
    public function skip($type)
    {
        switch ($type) {
            case TType::BOOL:
                return $this->readBool($bool);
            case TType::BYTE:
                return $this->readByte($byte);
            case TType::I16:
                return $this->readI16($i16);
            case TType::I32:
                return $this->readI32($i32);
            case TType::I64:
                return $this->readI64($i64);
            case TType::DOUBLE:
                return $this->readDouble($dub);
            case TType::STRING:
                return $this->readString($str);
            case TType::STRUCT:
                $result = $this->readStructBegin($name);
                while (true) {
                    $result += $this->readFieldBegin($name, $ftype, $fid);
                    if ($ftype == TType::STOP) {
                        break;
                    }
                    $result += $this->skip($ftype);
                    $result += $this->readFieldEnd();
                }
                $result += $this->readStructEnd();

                return $result;
            case TType::MAP:
                $result = $this->readMapBegin($keyType, $valType, $size);
                for ($i = 0; $i < $size; ++$i) {
                    $result += $this->skip($keyType);
                    $result += $this->skip($valType);
                }
                $result += $this->readMapEnd();

                return $result;
            case TType::SET:
                $result = $this->readSetBegin($elemType, $size);
                for ($i = 0; $i < $size; ++$i) {
                    $result += $this->skip($elemType);
                }
                $result += $this->readSetEnd();

                return $result;
            case TType::LST:
                $result = $this->readListBegin($elemType, $size);
                for ($i = 0; $i < $size; ++$i) {
                    $result += $this->skip($elemType);
                }
                $result += $this->readListEnd();

                return $result;
            default:
                throw new TProtocolException(
                    'Unknown field type: ' . $type,
                    TProtocolException::INVALID_DATA
                );
        }
    }

    /**
     * Utility for skipping binary data.
     *
     * @param TTransport $itrans TTransport object
     * @param int $type Field type
     */
    public static function skipBinary($itrans, $type)
    {
        switch ($type) {
            case TType::BOOL:
                return $itrans->readAll(1);
            case TType::BYTE:
                return $itrans->readAll(1);
            case TType::I16:
                return $itrans->readAll(2);
            case TType::I32:
                return $itrans->readAll(4);
            case TType::I64:
                return $itrans->readAll(8);
            case TType::DOUBLE:
                return $itrans->readAll(8);
            case TType::STRING:
                $len = unpack('N', $itrans->readAll(4));
                $len = $len[1];
                if ($len > 0x7FFFFFFF) {
                    $len = 0 - (($len - 1) ^ 0xFFFFFFFF);
                }

                return 4 + $itrans->readAll($len);
            case TType::STRUCT:
                $result = 0;
                while (true) {
                    $ftype = 0;
                    $fid = 0;
                    $data = $itrans->readAll(1);
                    $arr = unpack('c', $data);
                    $ftype = $arr[1];
                    if ($ftype == TType::STOP) {
                        break;
                    }
                    // I16 field id
                    $result += $itrans->readAll(2);
                    $result += self::skipBinary($itrans, $ftype);
                }

                return $result;
            case TType::MAP:
                // Ktype
                $data = $itrans->readAll(1);
                $arr = unpack('c', $data);
                $ktype = $arr[1];
                // Vtype
                $data = $itrans->readAll(1);
                $arr = unpack('c', $data);
                $vtype = $arr[1];
                // Size
                $data = $itrans->readAll(4);
                $arr = unpack('N', $data);
                $size = $arr[1];
                if ($size > 0x7FFFFFFF) {
                    $size = 0 - (($size - 1) ^ 0xFFFFFFFF);
                }
                $result = 6;
                for ($i = 0; $i < $size; ++$i) {
                    $result += self::skipBinary($itrans, $ktype);
                    $result += self::skipBinary($itrans, $vtype);
                }

                return $result;
            case TType::SET:
            case TType::LST:
                // Vtype
                $data = $itrans->readAll(1);
                $arr = unpack('c', $data);
                $vtype = $arr[1];
                // Size
                $data = $itrans->readAll(4);
                $arr = unpack('N', $data);
                $size = $arr[1];
                if ($size > 0x7FFFFFFF) {
                    $size = 0 - (($size - 1) ^ 0xFFFFFFFF);
                }
                $result = 5;
                for ($i = 0; $i < $size; ++$i) {
                    $result += self::skipBinary($itrans, $vtype);
                }

                return $result;
            default:
                throw new TProtocolException(
                    'Unknown field type: ' . $type,
                    TProtocolException::INVALID_DATA
                );
        }
    }
}
