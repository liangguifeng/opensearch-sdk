<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Factory;

use OpenSearch\Thrift\Transport\TTransport;

class TTransportFactory
{
    /**
     * @static
     * @param TTransport $transport
     * @return TTransport
     */
    public static function getTransport(TTransport $transport)
    {
        return $transport;
    }
}
