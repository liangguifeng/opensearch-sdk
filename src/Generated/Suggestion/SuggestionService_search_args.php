<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Suggestion;

use OpenSearch\Thrift\Type\TType;

class SuggestionService_search_args
{
    public static $_TSPEC;

    public function __construct()
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
            ];
        }
    }

    public function getName()
    {
        return 'SuggestionService_search_args';
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
        $xfer += $output->writeStructBegin('SuggestionService_search_args');
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
