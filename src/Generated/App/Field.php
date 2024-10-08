<?php

namespace OpenSearch\Generated\App;

use Thrift\Exception\TProtocolException;
use Thrift\Type\TType;

class Field
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $type;

    /**
     * @var bool
     */
    public $primary_key;

    /**
     * @var string[]
     */
    public $join_with;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'name',
                    'type' => TType::STRING,
                ],
                2 => [
                    'var' => 'type',
                    'type' => TType::STRING,
                ],
                3 => [
                    'var' => 'primary_key',
                    'type' => TType::BOOL,
                ],
                4 => [
                    'var' => 'join_with',
                    'type' => TType::LST,
                    'etype' => TType::STRING,
                    'elem' => [
                        'type' => TType::STRING,
                    ],
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['name'])) {
                $this->name = $vals['name'];
            }
            if (isset($vals['type'])) {
                $this->type = $vals['type'];
            }
            if (isset($vals['primary_key'])) {
                $this->primary_key = $vals['primary_key'];
            }
            if (isset($vals['join_with'])) {
                $this->join_with = $vals['join_with'];
            }
        }
    }

    public function getName()
    {
        return 'Field';
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
                        $xfer += $input->readString($this->name);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->primary_key);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::LST) {
                        $this->join_with = [];
                        $_size0 = 0;
                        $_etype3 = 0;
                        $xfer += $input->readListBegin($_etype3, $_size0);
                        for ($_i4 = 0; $_i4 < $_size0; ++$_i4) {
                            $elem5 = null;
                            $xfer += $input->readString($elem5);
                            $this->join_with[] = $elem5;
                        }
                        $xfer += $input->readListEnd();
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
        $xfer += $output->writeStructBegin('Field');
        if ($this->name !== null) {
            $xfer += $output->writeFieldBegin('name', TType::STRING, 1);
            $xfer += $output->writeString($this->name);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->type !== null) {
            $xfer += $output->writeFieldBegin('type', TType::STRING, 2);
            $xfer += $output->writeString($this->type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->primary_key !== null) {
            $xfer += $output->writeFieldBegin('primary_key', TType::BOOL, 3);
            $xfer += $output->writeBool($this->primary_key);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->join_with !== null) {
            if (!is_array($this->join_with)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('join_with', TType::LST, 4);

            $output->writeListBegin(TType::STRING, count($this->join_with));

            foreach ($this->join_with as $iter6) {
                $xfer += $output->writeString($iter6);
            }

            $output->writeListEnd();

            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}