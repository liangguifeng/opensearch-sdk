<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Exception;

/**
 * Protocol module. Contains all the types and definitions needed to implement
 * a protocol encoder/decoder.
 */

/**
 * Protocol exceptions.
 */
class TProtocolException extends TException
{
    public const UNKNOWN = 0;

    public const INVALID_DATA = 1;

    public const NEGATIVE_SIZE = 2;

    public const SIZE_LIMIT = 3;

    public const BAD_VERSION = 4;

    public const NOT_IMPLEMENTED = 5;

    public const DEPTH_LIMIT = 6;

    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
