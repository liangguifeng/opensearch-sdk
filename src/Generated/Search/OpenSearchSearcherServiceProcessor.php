<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;
use OpenSearch\Generated\GeneralSearcher\GeneralSearcherServiceProcessor;
use OpenSearch\Thrift\Exception\TApplicationException;
use OpenSearch\Thrift\Protocol\TBinaryProtocolAccelerated;
use OpenSearch\Thrift\Type\TMessageType;
use OpenSearch\Thrift\Type\TType;

class OpenSearchSearcherServiceProcessor extends GeneralSearcherServiceProcessor
{
    public function __construct($handler)
    {
        parent::__construct($handler);
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

    protected function process_execute($seqid, $input, $output)
    {
        $args = new OpenSearchSearcherService_execute_args();
        $args->read($input);
        $input->readMessageEnd();
        $result = new OpenSearchSearcherService_execute_result();
        try {
            $result->success = $this->handler_->execute($args->searchParams);
        } catch (OpenSearchException $error) {
            $result->error = $error;
        } catch (OpenSearchClientException $e) {
            $result->e = $e;
        }
        $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($output, 'execute', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
        } else {
            $output->writeMessageBegin('execute', TMessageType::REPLY, $seqid);
            $result->write($output);
            $output->writeMessageEnd();
            $output->getTransport()->flush();
        }
    }
}
