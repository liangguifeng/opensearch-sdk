<?php

namespace OpenSearch\Generated\App;

use OpenSearch\Generated\Common\Pageable;
use Thrift\Exception\TApplicationException;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Type\TMessageType;

class AppServiceClient implements AppServiceIf
{
    protected $input_;

    protected $output_;

    protected $seqid_ = 0;

    public function __construct($input, $output = null)
    {
        $this->input_ = $input;
        $this->output_ = $output ? $output : $input;
    }

    public function save($app)
    {
        $this->send_save($app);
        return $this->recv_save();
    }

    public function send_save($app)
    {
        $args = new AppService_save_args();
        $args->app = $app;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'save', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('save', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_save()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) {
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\App\AppService_save_result', $this->input_->isStrictRead());
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
            $result = new AppService_save_result();
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
        throw new \Exception('save failed: unknown result');
    }

    public function getById($identity)
    {
        $this->send_getById($identity);
        return $this->recv_getById();
    }

    public function send_getById($identity)
    {
        $args = new AppService_getById_args();
        $args->identity = $identity;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'getById', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('getById', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_getById()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) {
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\App\AppService_getById_result', $this->input_->isStrictRead());
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
            $result = new AppService_getById_result();
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
        throw new \Exception('getById failed: unknown result');
    }

    public function listAll(Pageable $pageable)
    {
        $this->send_listAll($pageable);
        return $this->recv_listAll();
    }

    public function send_listAll(Pageable $pageable)
    {
        $args = new AppService_listAll_args();
        $args->pageable = $pageable;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'listAll', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('listAll', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_listAll()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) {
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\App\AppService_listAll_result', $this->input_->isStrictRead());
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
            $result = new AppService_listAll_result();
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
        throw new \Exception('listAll failed: unknown result');
    }

    public function removeById($identity)
    {
        $this->send_removeById($identity);
        return $this->recv_removeById();
    }

    public function send_removeById($identity)
    {
        $args = new AppService_removeById_args();
        $args->identity = $identity;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'removeById', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('removeById', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_removeById()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) {
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\App\AppService_removeById_result', $this->input_->isStrictRead());
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
            $result = new AppService_removeById_result();
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
        throw new \Exception('removeById failed: unknown result');
    }

    public function updateById($identity, $app)
    {
        $this->send_updateById($identity, $app);
        return $this->recv_updateById();
    }

    public function send_updateById($identity, $app)
    {
        $args = new AppService_updateById_args();
        $args->identity = $identity;
        $args->app = $app;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'updateById', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('updateById', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_updateById()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) {
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\App\AppService_updateById_result', $this->input_->isStrictRead());
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
            $result = new AppService_updateById_result();
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
        throw new \Exception('updateById failed: unknown result');
    }

    public function reindexById($identity)
    {
        $this->send_reindexById($identity);
        return $this->recv_reindexById();
    }

    public function send_reindexById($identity)
    {
        $args = new AppService_reindexById_args();
        $args->identity = $identity;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'reindexById', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('reindexById', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_reindexById()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) {
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\App\AppService_reindexById_result', $this->input_->isStrictRead());
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
            $result = new AppService_reindexById_result();
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
        throw new \Exception('reindexById failed: unknown result');
    }
}