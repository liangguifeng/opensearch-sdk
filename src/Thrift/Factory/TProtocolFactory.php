<?php

declare(strict_types=1);

namespace Thrift\Factory;

/**
 * Protocol factory creates protocol objects from transports.
 */
interface TProtocolFactory
{
    /**
     * Build a protocol from the base transport.
     *
     * @param mixed $trans
     * @return Thrift\Protocol\TProtocol protocol
     */
    public function getProtocol($trans);
}
