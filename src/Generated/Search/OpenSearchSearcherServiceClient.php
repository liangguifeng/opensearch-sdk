<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Generated\GeneralSearcher\GeneralSearcherServiceClient;
use OpenSearch\Thrift\Exception\TApplicationException;
use OpenSearch\Thrift\Protocol\TBinaryProtocolAccelerated;
use OpenSearch\Thrift\Type\TMessageType;

class OpenSearchSearcherServiceClient extends GeneralSearcherServiceClient implements OpenSearchSearcherServiceIf
{
    public function __construct($input, $output = null)
    {
        parent::__construct($input, $output);
    }

    public function execute(SearchParams $searchParams)
    {
        $this->send_execute($searchParams);
        return $this->recv_execute();
    }

    public function send_execute(SearchParams $searchParams)
    {
        $args = new OpenSearchSearcherService_execute_args();
        $args->searchParams = $searchParams;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'execute', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('execute', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_execute()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) {
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\Search\OpenSearchSearcherService_execute_result', $this->input_->isStrictRead());
        } else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;

            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new OpenSearchSearcherService_execute_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        if ($result->success !== null) {
            return $result->success;
        }
        if ($result->error !== null) {
            throw $result->error;
        }
        if ($result->e !== null) {
            throw $result->e;
        }
        throw new \Exception('execute failed: unknown result');
    }
}
