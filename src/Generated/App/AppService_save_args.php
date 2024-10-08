<?php

namespace OpenSearch\Generated\App;

use Thrift\Type\TType;

class AppService_save_args
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $app;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'app',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['app'])) {
                $this->app = $vals['app'];
            }
        }
    }

    public function getName()
    {
        return 'AppService_save_args';
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
        $xfer += $output->writeStructBegin('AppService_save_args');
        if ($this->app !== null) {
            $xfer += $output->writeFieldBegin('app', TType::STRING, 1);
            $xfer += $output->writeString($this->app);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}