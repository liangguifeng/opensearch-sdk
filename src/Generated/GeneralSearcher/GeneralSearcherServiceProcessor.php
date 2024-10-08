<?php

declare(strict_types=1);

namespace OpenSearch\Generated\GeneralSearcher;

use OpenSearch\Thrift\Exception\TApplicationException;
use OpenSearch\Thrift\Type\TMessageType;
use OpenSearch\Thrift\Type\TType;

class GeneralSearcherServiceProcessor
{
    protected $handler_;

    public function __construct($handler)
    {
        $this->handler_ = $handler;
    }

    public function process($input, $output)
    {
        $rseqid = 0;
        $fname = null;
        $mtype = 0;

        $input->readMessageBegin($fname, $mtype, $rseqid);
        $methodname = 'process_' . $fname;
        if (!method_exists($this, $methodname)) {
            $input->skip(TType::STRUCT);
            $input->readMessageEnd();
            $x = new TApplicationException('Function ' . $fname . ' not implemented.', TApplicationException::UNKNOWN_METHOD);
            $output->writeMessageBegin($fname, TMessageType::EXCEPTION, $rseqid);
            $x->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
            return;
        }
        $this->{$methodname}($rseqid, $input, $output);
        return true;
    }
}
