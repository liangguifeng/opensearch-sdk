<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Summary;

use OpenSearch\Generated\Common\AppReference;
use OpenSearch\Thrift\Exception\TProtocolException;
use OpenSearch\Thrift\Type\TType;

class Summary
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $id;

    /**
     * @var AppReference
     */
    public $app;

    /**
     * @var string
     */
    public $field;

    /**
     * @var string
     */
    public $group;

    /**
     * @var int
     */
    public $len;

    /**
     * @var string
     */
    public $element;

    /**
     * @var string
     */
    public $ellipsis;

    /**
     * @var int
     */
    public $snippet;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'id',
                    'type' => TType::STRING,
                ],
                2 => [
                    'var' => 'app',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\Common\AppReference',
                ],
                10 => [
                    'var' => 'field',
                    'type' => TType::STRING,
                ],
                11 => [
                    'var' => 'group',
                    'type' => TType::STRING,
                ],
                12 => [
                    'var' => 'len',
                    'type' => TType::I32,
                ],
                13 => [
                    'var' => 'element',
                    'type' => TType::STRING,
                ],
                14 => [
                    'var' => 'ellipsis',
                    'type' => TType::STRING,
                ],
                15 => [
                    'var' => 'snippet',
                    'type' => TType::I32,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['id'])) {
                $this->id = $vals['id'];
            }
            if (isset($vals['app'])) {
                $this->app = $vals['app'];
            }
            if (isset($vals['field'])) {
                $this->field = $vals['field'];
            }
            if (isset($vals['group'])) {
                $this->group = $vals['group'];
            }
            if (isset($vals['len'])) {
                $this->len = $vals['len'];
            }
            if (isset($vals['element'])) {
                $this->element = $vals['element'];
            }
            if (isset($vals['ellipsis'])) {
                $this->ellipsis = $vals['ellipsis'];
            }
            if (isset($vals['snippet'])) {
                $this->snippet = $vals['snippet'];
            }
        }
    }

    public function getName()
    {
        return 'Summary';
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
                        $xfer += $input->readString($this->id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->app = new AppReference();
                        $xfer += $this->app->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->field);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->group);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->len);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->element);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 14:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->ellipsis);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 15:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->snippet);
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
        $xfer += $output->writeStructBegin('Summary');
        if ($this->id !== null) {
            $xfer += $output->writeFieldBegin('id', TType::STRING, 1);
            $xfer += $output->writeString($this->id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->app !== null) {
            if (!is_object($this->app)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('app', TType::STRUCT, 2);
            $xfer += $this->app->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->field !== null) {
            $xfer += $output->writeFieldBegin('field', TType::STRING, 10);
            $xfer += $output->writeString($this->field);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->group !== null) {
            $xfer += $output->writeFieldBegin('group', TType::STRING, 11);
            $xfer += $output->writeString($this->group);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->len !== null) {
            $xfer += $output->writeFieldBegin('len', TType::I32, 12);
            $xfer += $output->writeI32($this->len);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->element !== null) {
            $xfer += $output->writeFieldBegin('element', TType::STRING, 13);
            $xfer += $output->writeString($this->element);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->ellipsis !== null) {
            $xfer += $output->writeFieldBegin('ellipsis', TType::STRING, 14);
            $xfer += $output->writeString($this->ellipsis);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->snippet !== null) {
            $xfer += $output->writeFieldBegin('snippet', TType::I32, 15);
            $xfer += $output->writeI32($this->snippet);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
