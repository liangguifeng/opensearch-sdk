<?php

namespace OpenSearch\Generated\App;

use Thrift\Exception\TProtocolException;
use Thrift\Type\TType;

class Indexes
{
    public static $_TSPEC;

    /**
     * @var array
     */
    public $search_fields;

    /**
     * @var string[]
     */
    public $filter_fields;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'search_fields',
                    'type' => TType::MAP,
                    'ktype' => TType::STRING,
                    'vtype' => TType::STRUCT,
                    'key' => [
                        'type' => TType::STRING,
                    ],
                    'val' => [
                        'type' => TType::STRUCT,
                        'class' => '\OpenSearch\Generated\App\SearchField',
                    ],
                ],
                2 => [
                    'var' => 'filter_fields',
                    'type' => TType::LST,
                    'etype' => TType::STRING,
                    'elem' => [
                        'type' => TType::STRING,
                    ],
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['search_fields'])) {
                $this->search_fields = $vals['search_fields'];
            }
            if (isset($vals['filter_fields'])) {
                $this->filter_fields = $vals['filter_fields'];
            }
        }
    }

    public function getName()
    {
        return 'Indexes';
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
                        $this->search_fields = [];
                        $_size23 = 0;
                        $_ktype24 = 0;
                        $_vtype25 = 0;
                        $xfer += $input->readMapBegin($_ktype24, $_vtype25, $_size23);
                        for ($_i27 = 0; $_i27 < $_size23; ++$_i27) {
                            $key28 = '';
                            $val29 = new SearchField();
                            $xfer += $input->readString($key28);
                            $val29 = new SearchField();
                            $xfer += $val29->read($input);
                            $this->search_fields[$key28] = $val29;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->filter_fields = [];
                        $_size30 = 0;
                        $_etype33 = 0;
                        $xfer += $input->readListBegin($_etype33, $_size30);
                        for ($_i34 = 0; $_i34 < $_size30; ++$_i34) {
                            $elem35 = null;
                            $xfer += $input->readString($elem35);
                            $this->filter_fields[] = $elem35;
                        }
                        $xfer += $input->readListEnd();
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
        $xfer += $output->writeStructBegin('Indexes');
        if ($this->search_fields !== null) {
            if (!is_array($this->search_fields)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('search_fields', TType::MAP, 1);

            $output->writeMapBegin(TType::STRING, TType::STRUCT, count($this->search_fields));

            foreach ($this->search_fields as $kiter36 => $viter37) {
                $xfer += $output->writeString($kiter36);
                $xfer += $viter37->write($output);
            }

            $output->writeMapEnd();

            $xfer += $output->writeFieldEnd();
        }
        if ($this->filter_fields !== null) {
            if (!is_array($this->filter_fields)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('filter_fields', TType::LST, 2);

            $output->writeListBegin(TType::STRING, count($this->filter_fields));

            foreach ($this->filter_fields as $iter38) {
                $xfer += $output->writeString($iter38);
            }

            $output->writeListEnd();

            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}