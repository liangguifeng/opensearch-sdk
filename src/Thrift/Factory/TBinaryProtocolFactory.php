<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Factory;

use OpenSearch\Thrift\Protocol\TBinaryProtocol;

/**
 * Binary Protocol Factory.
 */
class TBinaryProtocolFactory implements TProtocolFactory
{
    private $strictRead_ = false;

    private $strictWrite_ = false;

    public function __construct($strictRead = false, $strictWrite = false)
    {
        $this->strictRead_ = $strictRead;
        $this->strictWrite_ = $strictWrite;
    }

    public function getProtocol($trans)
    {
        return new TBinaryProtocol($trans, $this->strictRead_, $this->strictWrite_);
    }
}
