<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Factory;

use OpenSearch\Thrift\Protocol\TJSONProtocol;

/**
 * JSON Protocol Factory.
 */
class TJSONProtocolFactory implements TProtocolFactory
{
    public function __construct() {}

    public function getProtocol($trans)
    {
        return new TJSONProtocol($trans);
    }
}
