<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Type;

/**
 * Message types for RPC.
 */
class TMessageType
{
    public const CALL = 1;

    public const REPLY = 2;

    public const EXCEPTION = 3;

    public const ONEWAY = 4;
}
