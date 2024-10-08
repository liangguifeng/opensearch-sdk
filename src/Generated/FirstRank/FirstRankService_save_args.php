<?php

declare(strict_types=1);

namespace OpenSearch\Generated\FirstRank;

use OpenSearch\Thrift\Exception\TProtocolException;
use OpenSearch\Thrift\Type\TType;

class FirstRankService_save_args
{
    public static $_TSPEC;

    /**
     * @var FirstRank
     */
    public $firstRank;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'firstRank',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\FirstRank\FirstRank',
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['firstRank'])) {
                $this->firstRank = $vals['firstRank'];
            }
        }
    }

    public function getName()
    {
        return 'FirstRankService_save_args';
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
                    if ($ftype == TType::STRUCT) {
                        $this->firstRank = new FirstRank();
                        $xfer += $this->firstRank->read($input);
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
        $xfer += $output->writeStructBegin('FirstRankService_save_args');
        if ($this->firstRank !== null) {
            if (!is_object($this->firstRank)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('firstRank', TType::STRUCT, 1);
            $xfer += $this->firstRank->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
