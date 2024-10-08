<?php

declare(strict_types=1);

namespace OpenSearch\Generated\FirstRank;

use OpenSearch\Thrift\Type\TType;

class Meta
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $attribute;

    /**
     * @var float
     */
    public $weight;

    /**
     * @var string
     */
    public $arg;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                10 => [
                    'var' => 'attribute',
                    'type' => TType::STRING,
                ],
                11 => [
                    'var' => 'weight',
                    'type' => TType::DOUBLE,
                ],
                12 => [
                    'var' => 'arg',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['attribute'])) {
                $this->attribute = $vals['attribute'];
            }
            if (isset($vals['weight'])) {
                $this->weight = $vals['weight'];
            }
            if (isset($vals['arg'])) {
                $this->arg = $vals['arg'];
            }
        }
    }

    public function getName()
    {
        return 'Meta';
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
                case 10:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->attribute);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::DOUBLE) {
                        $xfer += $input->readDouble($this->weight);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->arg);
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
        $xfer += $output->writeStructBegin('Meta');
        if ($this->attribute !== null) {
            $xfer += $output->writeFieldBegin('attribute', TType::STRING, 10);
            $xfer += $output->writeString($this->attribute);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->weight !== null) {
            $xfer += $output->writeFieldBegin('weight', TType::DOUBLE, 11);
            $xfer += $output->writeDouble($this->weight);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->arg !== null) {
            $xfer += $output->writeFieldBegin('arg', TType::STRING, 12);
            $xfer += $output->writeString($this->arg);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
