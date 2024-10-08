<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Factory;

use OpenSearch\Thrift\Protocol\TCompactProtocol;

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
