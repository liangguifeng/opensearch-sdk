<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Thrift\Type\TType;

/**
 * 聚合打散条件(distinct).
 *
 * 例如：检索关键词“手机”共获得10个结果，分别为：doc1，doc2，doc3，doc4，doc5，doc6，
 * doc7，doc8，doc9，doc10。其中前三个属于用户A，doc4-doc6属于用户B，剩余四个属于
 * 用户C。如果前端每页仅展示5个商品，则用户C将没有展示的机会。但是如果按照user_id进行抽
 * 取，每轮抽取1个，抽取2次，并保留抽取剩余的结果，则可以获得以下文档排列顺序：doc1、
 * doc4、doc7、doc2、doc5、doc8、doc3、doc6、doc9、doc10。可以看出，通过distinct
 * 排序，各个用户的 商品都得到了展示机会，结果排序更趋于合理。
 */
class Distinct
{
    public static $_TSPEC;

    /**
     * 为用户用于做distinct抽取的字段，该字段要求为可过滤字段。
     *
     * @var string
     */
    public $key;

    /**
     * 为一次抽取的document数量，默认值为1。
     *
     * @var int
     */
    public $distCount = 1;

    /**
     * 为抽取的次数，默认值为1。
     *
     * @var int
     */
    public $distTimes = 1;

    /**
     * 为是否保留抽取之后剩余的结果，true为保留，false则丢弃，丢弃时totalHits的个数会减去被distinct而丢弃的个数，但这个结果不一定准确，默认为true。
     *
     * @var bool
     */
    public $reserved = true;

    /**
     * 为过滤条件，被过滤的doc不参与distinct，只在后面的 排序中，这些被过滤的doc将和被distinct出来的第一组doc一起参与排序。默认是全部参与distinct。
     *
     * @var string
     */
    public $distFilter;

    /**
     * 当reserved为false时，设置update_total_hit为true，则最终total_hit会减去被distinct丢弃的的数目（不一定准确），为false则不减； 默认为false。
     *
     * @var bool
     */
    public $updateTotalHit = false;

    /**
     * 指定档位划分阈值。
     *
     * @var string
     */
    public $grade;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'key',
                    'type' => TType::STRING,
                ],
                3 => [
                    'var' => 'distCount',
                    'type' => TType::I32,
                ],
                5 => [
                    'var' => 'distTimes',
                    'type' => TType::I32,
                ],
                7 => [
                    'var' => 'reserved',
                    'type' => TType::BOOL,
                ],
                9 => [
                    'var' => 'distFilter',
                    'type' => TType::STRING,
                ],
                11 => [
                    'var' => 'updateTotalHit',
                    'type' => TType::BOOL,
                ],
                13 => [
                    'var' => 'grade',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['key'])) {
                $this->key = $vals['key'];
            }
            if (isset($vals['distCount'])) {
                $this->distCount = $vals['distCount'];
            }
            if (isset($vals['distTimes'])) {
                $this->distTimes = $vals['distTimes'];
            }
            if (isset($vals['reserved'])) {
                $this->reserved = $vals['reserved'];
            }
            if (isset($vals['distFilter'])) {
                $this->distFilter = $vals['distFilter'];
            }
            if (isset($vals['updateTotalHit'])) {
                $this->updateTotalHit = $vals['updateTotalHit'];
            }
            if (isset($vals['grade'])) {
                $this->grade = $vals['grade'];
            }
        }
    }

    public function getName()
    {
        return 'Distinct';
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
                        $xfer += $input->readString($this->key);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->distCount);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->distTimes);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->reserved);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->distFilter);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->updateTotalHit);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->grade);
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
        $xfer += $output->writeStructBegin('Distinct');
        if ($this->key !== null) {
            $xfer += $output->writeFieldBegin('key', TType::STRING, 1);
            $xfer += $output->writeString($this->key);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->distCount !== null) {
            $xfer += $output->writeFieldBegin('distCount', TType::I32, 3);
            $xfer += $output->writeI32($this->distCount);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->distTimes !== null) {
            $xfer += $output->writeFieldBegin('distTimes', TType::I32, 5);
            $xfer += $output->writeI32($this->distTimes);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->reserved !== null) {
            $xfer += $output->writeFieldBegin('reserved', TType::BOOL, 7);
            $xfer += $output->writeBool($this->reserved);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->distFilter !== null) {
            $xfer += $output->writeFieldBegin('distFilter', TType::STRING, 9);
            $xfer += $output->writeString($this->distFilter);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->updateTotalHit !== null) {
            $xfer += $output->writeFieldBegin('updateTotalHit', TType::BOOL, 11);
            $xfer += $output->writeBool($this->updateTotalHit);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->grade !== null) {
            $xfer += $output->writeFieldBegin('grade', TType::STRING, 13);
            $xfer += $output->writeString($this->grade);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
