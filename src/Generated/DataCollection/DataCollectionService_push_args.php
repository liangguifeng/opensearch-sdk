<?php

declare(strict_types=1);

namespace OpenSearch\Generated\DataCollection;

use OpenSearch\Thrift\Type\TType;

class DataCollectionService_push_args
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $docJson;

    /**
     * @var string
     */
    public $searchAppName;

    /**
     * @var string
     */
    public $dataCollectionName;

    /**
     * @var string
     */
    public $dataCollectionType;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'docJson',
                    'type' => TType::STRING,
                ],
                2 => [
                    'var' => 'searchAppName',
                    'type' => TType::STRING,
                ],
                3 => [
                    'var' => 'dataCollectionName',
                    'type' => TType::STRING,
                ],
                4 => [
                    'var' => 'dataCollectionType',
                    'type' => TType::STRING,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['docJson'])) {
                $this->docJson = $vals['docJson'];
            }
            if (isset($vals['searchAppName'])) {
                $this->searchAppName = $vals['searchAppName'];
            }
            if (isset($vals['dataCollectionName'])) {
                $this->dataCollectionName = $vals['dataCollectionName'];
            }
            if (isset($vals['dataCollectionType'])) {
                $this->dataCollectionType = $vals['dataCollectionType'];
            }
        }
    }

    public function getName()
    {
        return 'DataCollectionService_push_args';
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
                        $xfer += $input->readString($this->docJson);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->searchAppName);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->dataCollectionName);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->dataCollectionType);
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
        $xfer += $output->writeStructBegin('DataCollectionService_push_args');
        if ($this->docJson !== null) {
            $xfer += $output->writeFieldBegin('docJson', TType::STRING, 1);
            $xfer += $output->writeString($this->docJson);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->searchAppName !== null) {
            $xfer += $output->writeFieldBegin('searchAppName', TType::STRING, 2);
            $xfer += $output->writeString($this->searchAppName);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataCollectionName !== null) {
            $xfer += $output->writeFieldBegin('dataCollectionName', TType::STRING, 3);
            $xfer += $output->writeString($this->dataCollectionName);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataCollectionType !== null) {
            $xfer += $output->writeFieldBegin('dataCollectionType', TType::STRING, 4);
            $xfer += $output->writeString($this->dataCollectionType);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
