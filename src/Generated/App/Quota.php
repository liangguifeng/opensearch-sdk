<?php

namespace OpenSearch\Generated\App;

use Thrift\Type\TType;

class Quota
{
    public static $_TSPEC;

    /**
     * @var float
     */
    public $doc_size;

    /**
     * @var int
     */
    public $qps;

    /**
     * @var string
     */
    public $type;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'doc_size',
                    'type' => TType::DOUBLE,
                ],
                2 => [
                    'var' => 'qps',
                    'type' => TType::I32,
                ],
                3 => [
                    'var' => 'type',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['doc_size'])) {
                $this->doc_size = $vals['doc_size'];
            }
            if (isset($vals['qps'])) {
                $this->qps = $vals['qps'];
            }
            if (isset($vals['type'])) {
                $this->type = $vals['type'];
            }
        }
    }

    public function getName()
    {
        return 'Quota';
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
                    if ($ftype == TType::DOUBLE) {
                        $xfer += $input->readDouble($this->doc_size);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->qps);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->type);
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
        $xfer += $output->writeStructBegin('Quota');
        if ($this->doc_size !== null) {
            $xfer += $output->writeFieldBegin('doc_size', TType::DOUBLE, 1);
            $xfer += $output->writeDouble($this->doc_size);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->qps !== null) {
            $xfer += $output->writeFieldBegin('qps', TType::I32, 2);
            $xfer += $output->writeI32($this->qps);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->type !== null) {
            $xfer += $output->writeFieldBegin('type', TType::STRING, 3);
            $xfer += $output->writeString($this->type);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}