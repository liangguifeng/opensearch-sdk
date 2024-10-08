<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Exception;

/**
 * Transport exceptions.
 */
class TTransportException extends TException
{
    public const UNKNOWN = 0;

    public const NOT_OPEN = 1;

    public const ALREADY_OPEN = 2;

    public const TIMED_OUT = 3;

    public const END_OF_FILE = 4;

    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
