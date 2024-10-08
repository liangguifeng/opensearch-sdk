<?php

declare(strict_types=1);

namespace Thrift\Factory;

use Thrift\Protocol\TCompactProtocol;

/**
 * Compact Protocol Factory.
 */
class TCompactProtocolFactory implements TProtocolFactory
{
    public function __construct() {}

    public function getProtocol($trans)
    {
        return new TCompactProtocol($trans);
    }
}
