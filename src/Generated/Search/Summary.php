<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Thrift\Type\TType;

/**
 * 增加了此内容后，fieldName字段可能会被截断、飘红等。
 */
class Summary
{
    public static $_TSPEC;

    /**
     * 指定的生效的字段。此字段必需为可分词的text类型的字段。
     *
     * @var string
     */
    public $summary_field;

    /**
     * 指定结果集返回的词字段的字节长度，一个汉字为2个字节。
     *
     * @var string
     */
    public $summary_len;

    /**
     * 指定用什么符号来标注未展示完的数据，例如“...”。
     *
     * @var string
     */
    public $summary_ellipsis = '...';

    /**
     * 指定query命中几段summary内容。
     *
     * @var string
     */
    public $summary_snippet;

    /**
     * 指定命中的query的标红标签，可以为em等。
     *
     * @var string
     */
    public $summary_element;

    /**
     * 指定标签前缀。
     *
     * @var string
     */
    public $summary_element_prefix;

    /**
     * 指定标签后缀。
     *
     * @var string
     */
    public $summary_element_postfix;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'summary_field',
                    'type' => TType::STRING,
                ],
                3 => [
                    'var' => 'summary_len',
                    'type' => TType::STRING,
                ],
                5 => [
                    'var' => 'summary_ellipsis',
                    'type' => TType::STRING,
                ],
                7 => [
                    'var' => 'summary_snippet',
                    'type' => TType::STRING,
                ],
                9 => [
                    'var' => 'summary_element',
                    'type' => TType::STRING,
                ],
                11 => [
                    'var' => 'summary_element_prefix',
                    'type' => TType::STRING,
                ],
                13 => [
                    'var' => 'summary_element_postfix',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['summary_field'])) {
                $this->summary_field = $vals['summary_field'];
            }
            if (isset($vals['summary_len'])) {
                $this->summary_len = $vals['summary_len'];
            }
            if (isset($vals['summary_ellipsis'])) {
                $this->summary_ellipsis = $vals['summary_ellipsis'];
            }
            if (isset($vals['summary_snippet'])) {
                $this->summary_snippet = $vals['summary_snippet'];
            }
            if (isset($vals['summary_element'])) {
                $this->summary_element = $vals['summary_element'];
            }
            if (isset($vals['summary_element_prefix'])) {
                $this->summary_element_prefix = $vals['summary_element_prefix'];
            }
            if (isset($vals['summary_element_postfix'])) {
                $this->summary_element_postfix = $vals['summary_element_postfix'];
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
                        $xfer += $input->readString($this->summary_field);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->summary_len);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->summary_ellipsis);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->summary_snippet);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->summary_element);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->summary_element_prefix);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->summary_element_postfix);
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
        if ($this->summary_field !== null) {
            $xfer += $output->writeFieldBegin('summary_field', TType::STRING, 1);
            $xfer += $output->writeString($this->summary_field);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->summary_len !== null) {
            $xfer += $output->writeFieldBegin('summary_len', TType::STRING, 3);
            $xfer += $output->writeString($this->summary_len);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->summary_ellipsis !== null) {
            $xfer += $output->writeFieldBegin('summary_ellipsis', TType::STRING, 5);
            $xfer += $output->writeString($this->summary_ellipsis);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->summary_snippet !== null) {
            $xfer += $output->writeFieldBegin('summary_snippet', TType::STRING, 7);
            $xfer += $output->writeString($this->summary_snippet);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->summary_element !== null) {
            $xfer += $output->writeFieldBegin('summary_element', TType::STRING, 9);
            $xfer += $output->writeString($this->summary_element);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->summary_element_prefix !== null) {
            $xfer += $output->writeFieldBegin('summary_element_prefix', TType::STRING, 11);
            $xfer += $output->writeString($this->summary_element_prefix);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->summary_element_postfix !== null) {
            $xfer += $output->writeFieldBegin('summary_element_postfix', TType::STRING, 13);
            $xfer += $output->writeString($this->summary_element_postfix);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
