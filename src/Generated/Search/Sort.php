<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Thrift\Exception\TProtocolException;
use OpenSearch\Thrift\Type\TType;

/**
 * 排序字段及方式.
 */
class Sort
{
    public static $_TSPEC;

    /**
     * @var \OpenSearch\Generated\Search\SortField[]
     */
    public $sortFields;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'sortFields',
                    'type' => TType::LST,
                    'etype' => TType::STRUCT,
                    'elem' => [
                        'type' => TType::STRUCT,
                        'class' => '\OpenSearch\Generated\Search\SortField',
                    ],
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['sortFields'])) {
                $this->sortFields = $vals['sortFields'];
            }
        }
    }

    public function getName()
    {
        return 'Sort';
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
                    if ($ftype == TType::LST) {
                        $this->sortFields = [];
                        $_size21 = 0;
                        $_etype24 = 0;
                        $xfer += $input->readListBegin($_etype24, $_size21);
                        for ($_i25 = 0; $_i25 < $_size21; ++$_i25) {
                            $elem26 = null;
                            $elem26 = new SortField();
                            $xfer += $elem26->read($input);
                            $this->sortFields[] = $elem26;
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
        $xfer += $output->writeStructBegin('Sort');
        if ($this->sortFields !== null) {
            if (!is_array($this->sortFields)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('sortFields', TType::LST, 1);

            $output->writeListBegin(TType::STRUCT, count($this->sortFields));

            foreach ($this->sortFields as $iter27) {
                $xfer += $iter27->write($output);
            }

            $output->writeListEnd();

            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
