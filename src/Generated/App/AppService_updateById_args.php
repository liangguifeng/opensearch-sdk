<?php

namespace OpenSearch\Generated\App;

use Thrift\Type\TType;

class AppService_updateById_args
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $identity;

    /**
     * @var string
     */
    public $app;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'identity',
                    'type' => TType::STRING,
                ],
                2 => [
                    'var' => 'app',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['identity'])) {
                $this->identity = $vals['identity'];
            }
            if (isset($vals['app'])) {
                $this->app = $vals['app'];
            }
        }
    }

    public function getName()
    {
        return 'AppService_updateById_args';
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
                        $xfer += $input->readString($this->identity);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->app);
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
        $xfer += $output->writeStructBegin('AppService_updateById_args');
        if ($this->identity !== null) {
            $xfer += $output->writeFieldBegin('identity', TType::STRING, 1);
            $xfer += $output->writeString($this->identity);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->app !== null) {
            $xfer += $output->writeFieldBegin('app', TType::STRING, 2);
            $xfer += $output->writeString($this->app);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}