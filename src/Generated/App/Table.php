<?php

namespace OpenSearch\Generated\App;

use Thrift\Exception\TProtocolException;
use Thrift\Type\TType;

class Table
{
    public static $_TSPEC;

    /**
     * @var array
     */
    public $fields;

    /**
     * @var bool
     */
    public $primary_table;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'fields',
                    'type' => TType::MAP,
                    'ktype' => TType::STRING,
                    'vtype' => TType::STRUCT,
                    'key' => [
                        'type' => TType::STRING,
                    ],
                    'val' => [
                        'type' => TType::STRUCT,
                        'class' => '\OpenSearch\Generated\App\Field',
                    ],
                ],
                2 => [
                    'var' => 'primary_table',
                    'type' => TType::BOOL,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['fields'])) {
                $this->fields = $vals['fields'];
            }
            if (isset($vals['primary_table'])) {
                $this->primary_table = $vals['primary_table'];
            }
        }
    }

    public function getName()
    {
        return 'Table';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::MAP) {
                        $this->fields = [];
                        $_size7 = 0;
                        $_ktype8 = 0;
                        $_vtype9 = 0;
                        $xfer += $input->readMapBegin($_ktype8, $_vtype9, $_size7);
                        for ($_i11 = 0; $_i11 < $_size7; ++$_i11) {
                            $key12 = '';
                            $val13 = new Field();
                            $xfer += $input->readString($key12);
                            $val13 = new Field();
                            $xfer += $val13->read($input);
                            $this->fields[$key12] = $val13;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->primary_table);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('Table');
        if ($this->fields !== null) {
            if (!is_array($this->fields)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('fields', TType::MAP, 1);

            $output->writeMapBegin(TType::STRING, TType::STRUCT, count($this->fields));

            foreach ($this->fields as $kiter14 => $viter15) {
                $xfer += $output->writeString($kiter14);
                $xfer += $viter15->write($output);
            }

            $output->writeMapEnd();

            $xfer += $output->writeFieldEnd();
        }
        if ($this->primary_table !== null) {
            $xfer += $output->writeFieldBegin('primary_table', TType::BOOL, 2);
            $xfer += $output->writeBool($this->primary_table);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}