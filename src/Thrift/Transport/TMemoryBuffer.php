<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Transport;

use OpenSearch\Thrift\Exception\TTransportException;
use OpenSearch\Thrift\Factory\TStringFuncFactory;

/**
 * A memory buffer is a tranpsort that simply reads from and writes to an
 * in-memory string buffer. Anytime you call write on it, the data is simply
 * placed into a buffer, and anytime you call read, data is read from that
 * buffer.
 */
class TMemoryBuffer extends TTransport
{
    protected $buf_ = '';

    /**
     * Constructor. Optionally pass an initial value
     * for the buffer.
     * @param mixed $buf
     */
    public function __construct($buf = '')
    {
        $this->buf_ = $buf;
    }

    public function isOpen()
    {
        return true;
    }

    public function open() {}

    public function close() {}

    public function write($buf)
    {
        $this->buf_ .= $buf;
    }

    public function read($len)
    {
        $bufLength = TStringFuncFactory::create()->strlen($this->buf_);

        if ($bufLength === 0) {
            throw new TTransportException(
                'TMemoryBuffer: Could not read ' .
                                          $len . ' bytes from buffer.',
                TTransportException::UNKNOWN
            );
        }

        if ($bufLength <= $len) {
            $ret = $this->buf_;
            $this->buf_ = '';

            return $ret;
        }

        $ret = TStringFuncFactory::create()->substr($this->buf_, 0, $len);
        $this->buf_ = TStringFuncFactory::create()->substr($this->buf_, $len);

        return $ret;
    }

    public function getBuffer()
    {
        return $this->buf_;
    }

    public function available()
    {
        return TStringFuncFactory::create()->strlen($this->buf_);
    }

    public function putBack($data)
    {
        $this->buf_ = $data . $this->buf_;
    }
}
