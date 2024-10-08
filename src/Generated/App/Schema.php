<?php

namespace OpenSearch\Generated\App;

use Thrift\Exception\TProtocolException;
use Thrift\Type\TType;

class Schema
{
    public static $_TSPEC;

    /**
     * @var array
     */
    public $tables;

    /**
     * @var Indexes
     */
    public $indexes;

    /**
     * @var string
     */
    public $route_field;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'tables',
                    'type' => TType::MAP,
                    'ktype' => TType::STRING,
                    'vtype' => TType::STRUCT,
                    'key' => [
                        'type' => TType::STRING,
                    ],
                    'val' => [
                        'type' => TType::STRUCT,
                        'class' => '\OpenSearch\Generated\App\Table',
                    ],
                ],
                2 => [
                    'var' => 'indexes',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\App\Indexes',
                ],
                3 => [
                    'var' => 'route_field',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['tables'])) {
                $this->tables = $vals['tables'];
            }
            if (isset($vals['indexes'])) {
                $this->indexes = $vals['indexes'];
            }
            if (isset($vals['route_field'])) {
                $this->route_field = $vals['route_field'];
            }
        }
    }

    public function getName()
    {
        return 'Schema';
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
                        $this->tables = [];
                        $_size39 = 0;
                        $_ktype40 = 0;
                        $_vtype41 = 0;
                        $xfer += $input->readMapBegin($_ktype40, $_vtype41, $_size39);
                        for ($_i43 = 0; $_i43 < $_size39; ++$_i43) {
                            $key44 = '';
                            $val45 = new Table();
                            $xfer += $input->readString($key44);
                            $val45 = new Table();
                            $xfer += $val45->read($input);
                            $this->tables[$key44] = $val45;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->indexes = new Indexes();
                        $xfer += $this->indexes->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->route_field);
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
        $xfer += $output->writeStructBegin('Schema');
        if ($this->tables !== null) {
            if (!is_array($this->tables)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('tables', TType::MAP, 1);

            $output->writeMapBegin(TType::STRING, TType::STRUCT, count($this->tables));

            foreach ($this->tables as $kiter46 => $viter47) {
                $xfer += $output->writeString($kiter46);
                $xfer += $viter47->write($output);
            }

            $output->writeMapEnd();

            $xfer += $output->writeFieldEnd();
        }
        if ($this->indexes !== null) {
            if (!is_object($this->indexes)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('indexes', TType::STRUCT, 2);
            $xfer += $this->indexes->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->route_field !== null) {
            $xfer += $output->writeFieldBegin('route_field', TType::STRING, 3);
            $xfer += $output->writeString($this->route_field);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}