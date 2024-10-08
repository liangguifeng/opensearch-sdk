<?php

declare(strict_types=1);

namespace OpenSearch\Generated\OpenSearch;

use OpenSearch\Thrift\Exception\TProtocolException;
use OpenSearch\Thrift\Type\TType;

class OpenSearchService_call_args
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $path;

    /**
     * @var array
     */
    public $params;

    /**
     * @var string
     */
    public $method;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'path',
                    'type' => TType::STRING,
                ],
                2 => [
                    'var' => 'params',
                    'type' => TType::MAP,
                    'ktype' => TType::STRING,
                    'vtype' => TType::STRING,
                    'key' => [
                        'type' => TType::STRING,
                    ],
                    'val' => [
                        'type' => TType::STRING,
                    ],
                ],
                3 => [
                    'var' => 'method',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['path'])) {
                $this->path = $vals['path'];
            }
            if (isset($vals['params'])) {
                $this->params = $vals['params'];
            }
            if (isset($vals['method'])) {
                $this->method = $vals['method'];
            }
        }
    }

    public function getName()
    {
        return 'OpenSearchService_call_args';
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
                        $xfer += $input->readString($this->path);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::MAP) {
                        $this->params = [];
                        $_size9 = 0;
                        $_ktype10 = 0;
                        $_vtype11 = 0;
                        $xfer += $input->readMapBegin($_ktype10, $_vtype11, $_size9);
                        for ($_i13 = 0; $_i13 < $_size9; ++$_i13) {
                            $key14 = '';
                            $val15 = '';
                            $xfer += $input->readString($key14);
                            $xfer += $input->readString($val15);
                            $this->params[$key14] = $val15;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->method);
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
        $xfer += $output->writeStructBegin('OpenSearchService_call_args');
        if ($this->path !== null) {
            $xfer += $output->writeFieldBegin('path', TType::STRING, 1);
            $xfer += $output->writeString($this->path);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->params !== null) {
            if (!is_array($this->params)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('params', TType::MAP, 2);

            $output->writeMapBegin(TType::STRING, TType::STRING, count($this->params));

            foreach ($this->params as $kiter16 => $viter17) {
                $xfer += $output->writeString($kiter16);
                $xfer += $output->writeString($viter17);
            }

            $output->writeMapEnd();

            $xfer += $output->writeFieldEnd();
        }
        if ($this->method !== null) {
            $xfer += $output->writeFieldBegin('method', TType::STRING, 3);
            $xfer += $output->writeString($this->method);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
