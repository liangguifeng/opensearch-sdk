<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Thrift\Type\TType;

/**
 * 添加统计信息(aggregate).
 *
 * 一个关键词通常能命中数以万计的文档，用户不太可能浏览所有文档来获取信息。而用户感兴趣的
 * 可 能是一些统计类的信息，比如，查询“手机”这个关键词，想知道每个卖家所有商品中的最高价格。
 * 则可以按照卖家的user_id分组，统计每个小组中最大的price值，例如：
 * groupKey:user_id,aggFun:max(price)
 *
 * 相关wiki，请查询：
 * @see http://docs.aliyun.com/?spm=5176.2020520121.103.8.VQIcGd&tag=tun#/pub/opensearch/api-reference/query-clause&aggregate-clause
 */
class Aggregate
{
    public static $_TSPEC;

    /**
     * 指定需要统计的字段名称。
     *
     * @var string
     */
    public $groupKey;

    /**
     * 指定统计的方法。当前支持：count、max、min、sum等。
     *
     * @var string
     */
    public $aggFun;

    /**
     * 指定统计范围。
     *
     * @var string
     */
    public $range;

    /**
     * 最大组个数。
     *
     * @var string
     */
    public $maxGroup;

    /**
     * 指定过滤某些统计。
     *
     * @var string
     */
    public $aggFilter;

    /**
     * 指定抽样的阈值。
     *
     * @var string
     */
    public $aggSamplerThresHold;

    /**
     * 指定抽样的步长。
     *
     * @var string
     */
    public $aggSamplerStep;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'groupKey',
                    'type' => TType::STRING,
                ],
                3 => [
                    'var' => 'aggFun',
                    'type' => TType::STRING,
                ],
                5 => [
                    'var' => 'range',
                    'type' => TType::STRING,
                ],
                7 => [
                    'var' => 'maxGroup',
                    'type' => TType::STRING,
                ],
                9 => [
                    'var' => 'aggFilter',
                    'type' => TType::STRING,
                ],
                11 => [
                    'var' => 'aggSamplerThresHold',
                    'type' => TType::STRING,
                ],
                13 => [
                    'var' => 'aggSamplerStep',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['groupKey'])) {
                $this->groupKey = $vals['groupKey'];
            }
            if (isset($vals['aggFun'])) {
                $this->aggFun = $vals['aggFun'];
            }
            if (isset($vals['range'])) {
                $this->range = $vals['range'];
            }
            if (isset($vals['maxGroup'])) {
                $this->maxGroup = $vals['maxGroup'];
            }
            if (isset($vals['aggFilter'])) {
                $this->aggFilter = $vals['aggFilter'];
            }
            if (isset($vals['aggSamplerThresHold'])) {
                $this->aggSamplerThresHold = $vals['aggSamplerThresHold'];
            }
            if (isset($vals['aggSamplerStep'])) {
                $this->aggSamplerStep = $vals['aggSamplerStep'];
            }
        }
    }

    public function getName()
    {
        return 'Aggregate';
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
                        $xfer += $input->readString($this->groupKey);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->aggFun);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->range);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->maxGroup);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->aggFilter);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->aggSamplerThresHold);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->aggSamplerStep);
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
        $xfer += $output->writeStructBegin('Aggregate');
        if ($this->groupKey !== null) {
            $xfer += $output->writeFieldBegin('groupKey', TType::STRING, 1);
            $xfer += $output->writeString($this->groupKey);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->aggFun !== null) {
            $xfer += $output->writeFieldBegin('aggFun', TType::STRING, 3);
            $xfer += $output->writeString($this->aggFun);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->range !== null) {
            $xfer += $output->writeFieldBegin('range', TType::STRING, 5);
            $xfer += $output->writeString($this->range);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->maxGroup !== null) {
            $xfer += $output->writeFieldBegin('maxGroup', TType::STRING, 7);
            $xfer += $output->writeString($this->maxGroup);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->aggFilter !== null) {
            $xfer += $output->writeFieldBegin('aggFilter', TType::STRING, 9);
            $xfer += $output->writeString($this->aggFilter);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->aggSamplerThresHold !== null) {
            $xfer += $output->writeFieldBegin('aggSamplerThresHold', TType::STRING, 11);
            $xfer += $output->writeString($this->aggSamplerThresHold);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->aggSamplerStep !== null) {
            $xfer += $output->writeFieldBegin('aggSamplerStep', TType::STRING, 13);
            $xfer += $output->writeString($this->aggSamplerStep);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
