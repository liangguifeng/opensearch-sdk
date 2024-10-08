<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Thrift\Type\TType;

class SortField
{
    public static $_TSPEC;

    /**
     * 排序方式字段名.
     *
     * @var string
     */
    public $field;

    /**
     * 排序方式，有升序“INCREASE”和降序“DECREASE”两种方式。默认值为“DECREASE”.
     *
     * @var int
     */
    public $order = 0;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'field',
                    'type' => TType::STRING,
                ],
                3 => [
                    'var' => 'order',
                    'type' => TType::I32,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['field'])) {
                $this->field = $vals['field'];
            }
            if (isset($vals['order'])) {
                $this->order = $vals['order'];
            }
        }
    }

    public function getName()
    {
        return 'SortField';
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
                        $xfer += $input->readString($this->field);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->order);
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
        $xfer += $output->writeStructBegin('SortField');
        if ($this->field !== null) {
            $xfer += $output->writeFieldBegin('field', TType::STRING, 1);
            $xfer += $output->writeString($this->field);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->order !== null) {
            $xfer += $output->writeFieldBegin('order', TType::I32, 3);
            $xfer += $output->writeI32($this->order);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
