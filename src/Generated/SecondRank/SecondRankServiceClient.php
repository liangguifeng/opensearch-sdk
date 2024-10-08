<?php

declare(strict_types=1);

namespace OpenSearch\Generated\SecondRank;

use OpenSearch\Thrift\Exception\TApplicationException;
use OpenSearch\Thrift\Protocol\TBinaryProtocolAccelerated;
use OpenSearch\Thrift\Type\TMessageType;

class SecondRankServiceClient implements SecondRankServiceIf
{
    protected $input_;

    protected $output_;

    protected $seqid_ = 0;

    public function __construct($input, $output = null)
    {
        $this->input_ = $input;
        $this->output_ = $output ? $output : $input;
    }

    public function save(SecondRank $secondRank)
    {
        $this->send_save($secondRank);
        return $this->recv_save();
    }

    public function send_save(SecondRank $secondRank)
    {
        $args = new SecondRankService_save_args();
        $args->secondRank = $secondRank;
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
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\SecondRank\SecondRankService_save_result', $this->input_->isStrictRead());
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
            $result = new SecondRankService_save_result();
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

    public function listAll()
    {
        $this->send_listAll();
        return $this->recv_listAll();
    }

    public function send_listAll()
    {
        $args = new SecondRankService_listAll_args();
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
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\SecondRank\SecondRankService_listAll_result', $this->input_->isStrictRead());
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
            $result = new SecondRankService_listAll_result();
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

    public function getById($id)
    {
        $this->send_getById($id);
        return $this->recv_getById();
    }

    public function send_getById($id)
    {
        $args = new SecondRankService_getById_args();
        $args->id = $id;
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
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\SecondRank\SecondRankService_getById_result', $this->input_->isStrictRead());
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
            $result = new SecondRankService_getById_result();
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

    public function listByAppIdAndName($appId, $name)
    {
        $this->send_listByAppIdAndName($appId, $name);
        return $this->recv_listByAppIdAndName();
    }

    public function send_listByAppIdAndName($appId, $name)
    {
        $args = new SecondRankService_listByAppIdAndName_args();
        $args->appId = $appId;
        $args->name = $name;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'listByAppIdAndName', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('listByAppIdAndName', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_listByAppIdAndName()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) {
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\SecondRank\SecondRankService_listByAppIdAndName_result', $this->input_->isStrictRead());
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
            $result = new SecondRankService_listByAppIdAndName_result();
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
        throw new \Exception('listByAppIdAndName failed: unknown result');
    }

    public function updateById($id, SecondRank $secondRank)
    {
        $this->send_updateById($id, $secondRank);
        return $this->recv_updateById();
    }

    public function send_updateById($id, SecondRank $secondRank)
    {
        $args = new SecondRankService_updateById_args();
        $args->id = $id;
        $args->secondRank = $secondRank;
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
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\SecondRank\SecondRankService_updateById_result', $this->input_->isStrictRead());
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
            $result = new SecondRankService_updateById_result();
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

    public function removeById($id)
    {
        $this->send_removeById($id);
        return $this->recv_removeById();
    }

    public function send_removeById($id)
    {
        $args = new SecondRankService_removeById_args();
        $args->id = $id;
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
            $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\SecondRank\SecondRankService_removeById_result', $this->input_->isStrictRead());
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
            $result = new SecondRankService_removeById_result();
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
}
