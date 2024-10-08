<?php

namespace OpenSearch\Generated\App;

use Thrift\Exception\TProtocolException;
use Thrift\Type\TType;

class Group
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $type = 'advance';

    /**
     * @var string
     */
    public $current_version;

    /**
     * @var string[]
     */
    public $versions;

    /**
     * @var int
     */
    public $switch_time;

    /**
     * @var string
     */
    public $id;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'type',
                    'type' => TType::STRING,
                ],
                2 => [
                    'var' => 'current_version',
                    'type' => TType::STRING,
                ],
                3 => [
                    'var' => 'versions',
                    'type' => TType::LST,
                    'etype' => TType::STRING,
                    'elem' => [
                        'type' => TType::STRING,
                    ],
                ],
                4 => [
                    'var' => 'switch_time',
                    'type' => TType::I32,
                ],
                5 => [
                    'var' => 'id',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['type'])) {
                $this->type = $vals['type'];
            }
            if (isset($vals['current_version'])) {
                $this->current_version = $vals['current_version'];
            }
            if (isset($vals['versions'])) {
                $this->versions = $vals['versions'];
            }
            if (isset($vals['switch_time'])) {
                $this->switch_time = $vals['switch_time'];
            }
            if (isset($vals['id'])) {
                $this->id = $vals['id'];
            }
        }
    }

    public function getName()
    {
        return 'Group';
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
                        $xfer += $input->readString($this->type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->current_version);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::LST) {
                        $this->versions = [];
                        $_size48 = 0;
                        $_etype51 = 0;
                        $xfer += $input->readListBegin($_etype51, $_size48);
                        for ($_i52 = 0; $_i52 < $_size48; ++$_i52) {
                            $elem53 = null;
                            $xfer += $input->readString($elem53);
                            $this->versions[] = $elem53;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->switch_time);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->id);
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
        $xfer += $output->writeStructBegin('Group');
        if ($this->type !== null) {
            $xfer += $output->writeFieldBegin('type', TType::STRING, 1);
            $xfer += $output->writeString($this->type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->current_version !== null) {
            $xfer += $output->writeFieldBegin('current_version', TType::STRING, 2);
            $xfer += $output->writeString($this->current_version);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->versions !== null) {
            if (!is_array($this->versions)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('versions', TType::LST, 3);

            $output->writeListBegin(TType::STRING, count($this->versions));

            foreach ($this->versions as $iter54) {
                $xfer += $output->writeString($iter54);
            }

            $output->writeListEnd();

            $xfer += $output->writeFieldEnd();
        }
        if ($this->switch_time !== null) {
            $xfer += $output->writeFieldBegin('switch_time', TType::I32, 4);
            $xfer += $output->writeI32($this->switch_time);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->id !== null) {
            $xfer += $output->writeFieldBegin('id', TType::STRING, 5);
            $xfer += $output->writeString($this->id);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}