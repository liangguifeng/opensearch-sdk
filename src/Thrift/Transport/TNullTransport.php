<?php

declare(strict_types=1);

namespace Thrift\Transport;

use Thrift\Exception\TTransportException;

/**
 * Transport that only accepts writes and ignores them.
 * This is useful for measuring the serialized size of structures.
 */
class TNullTransport extends TTransport
{
    public function isOpen()
    {
        return true;
    }

    public function open() {}

    public function close() {}

    public function read($len)
    {
        throw new TTransportException("Can't read from TNullTransport.");
    }

    public function write($buf) {}
}
