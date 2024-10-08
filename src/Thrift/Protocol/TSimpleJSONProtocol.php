<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Protocol;

use OpenSearch\Thrift\Exception\TException;
use OpenSearch\Thrift\Protocol\SimpleJSON\CollectionMapKeyException;
use OpenSearch\Thrift\Protocol\SimpleJSON\Context;
use OpenSearch\Thrift\Protocol\SimpleJSON\ListContext;
use OpenSearch\Thrift\Protocol\SimpleJSON\MapContext;
use OpenSearch\Thrift\Protocol\SimpleJSON\StructContext;

/**
 * SimpleJSON implementation of thrift protocol, ported from Java.
 */
class TSimpleJSONProtocol extends TProtocol
{
    public const COMMA = ',';

    public const COLON = ':';

    public const LBRACE = '{';

    public const RBRACE = '}';

    public const LBRACKET = '[';

    public const RBRACKET = ']';

    public const QUOTE = '"';

    public const NAME_MAP = 'map';

    public const NAME_LIST = 'lst';

    public const NAME_SET = 'set';

    protected $writeContext_;

    protected $writeContextStack_ = [];

    /**
     * Constructor.
     * @param mixed $trans
     */
    public function __construct($trans)
    {
        parent::__construct($trans);
        $this->writeContext_ = new Context();
    }

    /**
     * Writes the message header.
     *
     * @param string $name Function name
     * @param int $type message type TMessageType::CALL or TMessageType::REPLY
     * @param int $seqid The sequence id of this message
     */
    public function writeMessageBegin($name, $type, $seqid)
    {
        $this->trans_->write(self::LBRACKET);
        $this->pushWriteContext(new ListContext($this));
        $this->writeJSONString($name);
        $this->writeJSONInteger($type);
        $this->writeJSONInteger($seqid);
    }

    /**
     * Close the message.
     */
    public function writeMessageEnd()
    {
        $this->popWriteContext();
        $this->trans_->write(self::RBRACKET);
    }

    /**
     * Writes a struct header.
     *
     * @param string $name Struct name
     */
    public function writeStructBegin($name)
    {
        $this->writeContext_->write();
        $this->trans_->write(self::LBRACE);
        $this->pushWriteContext(new StructContext($this));
    }

    /**
     * Close a struct.
     */
    public function writeStructEnd()
    {
        $this->popWriteContext();
        $this->trans_->write(self::RBRACE);
    }

    public function writeFieldBegin($fieldName, $fieldType, $fieldId)
    {
        $this->writeJSONString($fieldName);
    }

    public function writeFieldEnd() {}

    public function writeFieldStop() {}

    public function writeMapBegin($keyType, $valType, $size)
    {
        $this->assertContextIsNotMapKey(self::NAME_MAP);
        $this->writeContext_->write();
        $this->trans_->write(self::LBRACE);
        $this->pushWriteContext(new MapContext($this));
    }

    public function writeMapEnd()
    {
        $this->popWriteContext();
        $this->trans_->write(self::RBRACE);
    }

    public function writeListBegin($elemType, $size)
    {
        $this->assertContextIsNotMapKey(self::NAME_LIST);
        $this->writeContext_->write();
        $this->trans_->write(self::LBRACKET);
        $this->pushWriteContext(new ListContext($this));
        // No metadata!
    }

    public function writeListEnd()
    {
        $this->popWriteContext();
        $this->trans_->write(self::RBRACKET);
    }

    public function writeSetBegin($elemType, $size)
    {
        $this->assertContextIsNotMapKey(self::NAME_SET);
        $this->writeContext_->write();
        $this->trans_->write(self::LBRACKET);
        $this->pushWriteContext(new ListContext($this));
        // No metadata!
    }

    public function writeSetEnd()
    {
        $this->popWriteContext();
        $this->trans_->write(self::RBRACKET);
    }

    public function writeBool($bool)
    {
        $this->writeJSONInteger($bool ? 1 : 0);
    }

    public function writeByte($byte)
    {
        $this->writeJSONInteger($byte);
    }

    public function writeI16($i16)
    {
        $this->writeJSONInteger($i16);
    }

    public function writeI32($i32)
    {
        $this->writeJSONInteger($i32);
    }

    public function writeI64($i64)
    {
        $this->writeJSONInteger($i64);
    }

    public function writeDouble($dub)
    {
        $this->writeJSONDouble($dub);
    }

    public function writeString($str)
    {
        $this->writeJSONString($str);
    }

    /**
     * Reading methods.
     *
     * simplejson is not meant to be read back into thrift
     * - see http://wiki.apache.org/thrift/ThriftUsageJava
     * - use JSON instead
     * @param mixed $name
     * @param mixed $type
     * @param mixed $seqid
     */
    public function readMessageBegin(&$name, &$type, &$seqid)
    {
        throw new TException('Not implemented');
    }

    public function readMessageEnd()
    {
        throw new TException('Not implemented');
    }

    public function readStructBegin(&$name)
    {
        throw new TException('Not implemented');
    }

    public function readStructEnd()
    {
        throw new TException('Not implemented');
    }

    public function readFieldBegin(&$name, &$fieldType, &$fieldId)
    {
        throw new TException('Not implemented');
    }

    public function readFieldEnd()
    {
        throw new TException('Not implemented');
    }

    public function readMapBegin(&$keyType, &$valType, &$size)
    {
        throw new TException('Not implemented');
    }

    public function readMapEnd()
    {
        throw new TException('Not implemented');
    }

    public function readListBegin(&$elemType, &$size)
    {
        throw new TException('Not implemented');
    }

    public function readListEnd()
    {
        throw new TException('Not implemented');
    }

    public function readSetBegin(&$elemType, &$size)
    {
        throw new TException('Not implemented');
    }

    public function readSetEnd()
    {
        throw new TException('Not implemented');
    }

    public function readBool(&$bool)
    {
        throw new TException('Not implemented');
    }

    public function readByte(&$byte)
    {
        throw new TException('Not implemented');
    }

    public function readI16(&$i16)
    {
        throw new TException('Not implemented');
    }

    public function readI32(&$i32)
    {
        throw new TException('Not implemented');
    }

    public function readI64(&$i64)
    {
        throw new TException('Not implemented');
    }

    public function readDouble(&$dub)
    {
        throw new TException('Not implemented');
    }

    public function readString(&$str)
    {
        throw new TException('Not implemented');
    }

    /**
     * Push a new write context onto the stack.
     */
    protected function pushWriteContext(Context $c)
    {
        $this->writeContextStack_[] = $this->writeContext_;
        $this->writeContext_ = $c;
    }

    /**
     * Pop the last write context off the stack.
     */
    protected function popWriteContext()
    {
        $this->writeContext_ = array_pop($this->writeContextStack_);
    }

    /**
     * Used to make sure that we are not encountering a map whose keys are containers.
     * @param mixed $invalidKeyType
     */
    protected function assertContextIsNotMapKey($invalidKeyType)
    {
        if ($this->writeContext_->isMapKey()) {
            throw new CollectionMapKeyException(
                'Cannot serialize a map with keys that are of type ' .
                $invalidKeyType
            );
        }
    }

    private function writeJSONString($b)
    {
        $this->writeContext_->write();

        $this->trans_->write(json_encode((string) $b));
    }

    private function writeJSONInteger($num)
    {
        $isMapKey = $this->writeContext_->isMapKey();

        $this->writeContext_->write();

        if ($isMapKey) {
            $this->trans_->write(self::QUOTE);
        }

        $this->trans_->write((int) $num);

        if ($isMapKey) {
            $this->trans_->write(self::QUOTE);
        }
    }

    private function writeJSONDouble($num)
    {
        $isMapKey = $this->writeContext_->isMapKey();

        $this->writeContext_->write();

        if ($isMapKey) {
            $this->trans_->write(self::QUOTE);
        }

        $this->trans_->write(json_encode((float) $num));

        if ($isMapKey) {
            $this->trans_->write(self::QUOTE);
        }
    }
}
