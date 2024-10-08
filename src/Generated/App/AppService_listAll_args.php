<?php

namespace OpenSearch\Generated\App;

use OpenSearch\Generated\Common\Pageable;
use Thrift\Exception\TProtocolException;
use Thrift\Type\TType;

class AppService_listAll_args
{
    public static $_TSPEC;

    /**
     * @var Pageable
     */
    public $pageable;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'pageable',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\Common\Pageable',
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['pageable'])) {
                $this->pageable = $vals['pageable'];
            }
        }
    }

    public function getName()
    {
        return 'AppService_listAll_args';
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
                        $this->pageable = new Pageable();
                        $xfer += $this->pageable->read($input);
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
        $xfer += $output->writeStructBegin('AppService_listAll_args');
        if ($this->pageable !== null) {
            if (!is_object($this->pageable)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('pageable', TType::STRUCT, 1);
            $xfer += $this->pageable->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}