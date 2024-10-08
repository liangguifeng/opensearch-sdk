<?php

declare(strict_types=1);

namespace Thrift\Factory;

use Thrift\Protocol\TJSONProtocol;

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
