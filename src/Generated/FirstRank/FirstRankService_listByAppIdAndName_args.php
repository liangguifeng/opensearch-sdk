<?php

declare(strict_types=1);

namespace OpenSearch\Generated\FirstRank;

use OpenSearch\Thrift\Type\TType;

class FirstRankService_listByAppIdAndName_args
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $appId;

    /**
     * @var string
     */
    public $name;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'appId',
                    'type' => TType::STRING,
                ],
                2 => [
                    'var' => 'name',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['appId'])) {
                $this->appId = $vals['appId'];
            }
            if (isset($vals['name'])) {
                $this->name = $vals['name'];
            }
        }
    }

    public function getName()
    {
        return 'FirstRankService_listByAppIdAndName_args';
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
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->appId);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->name);
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
        $xfer += $output->writeStructBegin('FirstRankService_listByAppIdAndName_args');
        if ($this->appId !== null) {
            $xfer += $output->writeFieldBegin('appId', TType::STRING, 1);
            $xfer += $output->writeString($this->appId);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->name !== null) {
            $xfer += $output->writeFieldBegin('name', TType::STRING, 2);
            $xfer += $output->writeString($this->name);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
