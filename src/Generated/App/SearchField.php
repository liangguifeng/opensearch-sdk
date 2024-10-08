<?php

namespace OpenSearch\Generated\App;

use Thrift\Exception\TProtocolException;
use Thrift\Type\TType;

class SearchField
{
    public static $_TSPEC;

    /**
     * @var string[]
     */
    public $fields;

    /**
     * @var string
     */
    public $analyzer;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'fields',
                    'type' => TType::LST,
                    'etype' => TType::STRING,
                    'elem' => [
                        'type' => TType::STRING,
                    ],
                ],
                2 => [
                    'var' => 'analyzer',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['fields'])) {
                $this->fields = $vals['fields'];
            }
            if (isset($vals['analyzer'])) {
                $this->analyzer = $vals['analyzer'];
            }
        }
    }

    public function getName()
    {
        return 'SearchField';
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
                    if ($ftype == TType::LST) {
                        $this->fields = [];
                        $_size16 = 0;
                        $_etype19 = 0;
                        $xfer += $input->readListBegin($_etype19, $_size16);
                        for ($_i20 = 0; $_i20 < $_size16; ++$_i20) {
                            $elem21 = null;
                            $xfer += $input->readString($elem21);
                            $this->fields[] = $elem21;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->analyzer);
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
        $xfer += $output->writeStructBegin('SearchField');
        if ($this->fields !== null) {
            if (!is_array($this->fields)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('fields', TType::LST, 1);

            $output->writeListBegin(TType::STRING, count($this->fields));

            foreach ($this->fields as $iter22) {
                $xfer += $output->writeString($iter22);
            }

            $output->writeListEnd();

            $xfer += $output->writeFieldEnd();
        }
        if ($this->analyzer !== null) {
            $xfer += $output->writeFieldBegin('analyzer', TType::STRING, 2);
            $xfer += $output->writeString($this->analyzer);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}