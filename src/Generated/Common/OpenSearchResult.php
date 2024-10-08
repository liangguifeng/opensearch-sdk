<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Common;

use OpenSearch\Thrift\Exception\TProtocolException;
use OpenSearch\Thrift\Type\TType;

class OpenSearchResult
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $result;

    /**
     * @var TraceInfo
     */
    public $traceInfo;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'result',
                    'type' => TType::STRING,
                ],
                3 => [
                    'var' => 'traceInfo',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\Common\TraceInfo',
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['result'])) {
                $this->result = $vals['result'];
            }
            if (isset($vals['traceInfo'])) {
                $this->traceInfo = $vals['traceInfo'];
            }
        }
    }

    public function getName()
    {
        return 'OpenSearchResult';
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
                        $xfer += $input->readString($this->result);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRUCT) {
                        $this->traceInfo = new TraceInfo();
                        $xfer += $this->traceInfo->read($input);
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
        $xfer += $output->writeStructBegin('OpenSearchResult');
        if ($this->result !== null) {
            $xfer += $output->writeFieldBegin('result', TType::STRING, 1);
            $xfer += $output->writeString($this->result);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->traceInfo !== null) {
            if (!is_object($this->traceInfo)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('traceInfo', TType::STRUCT, 3);
            $xfer += $this->traceInfo->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
