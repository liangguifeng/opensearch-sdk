<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Type;

/**
 * Data types that can be sent via Thrift.
 */
class TType
{
    public const STOP = 0;

    public const VOID = 1;

    public const BOOL = 2;

    public const BYTE = 3;

    public const I08 = 3;

    public const DOUBLE = 4;

    public const I16 = 6;

    public const I32 = 8;

    public const I64 = 10;

    public const STRING = 11;

    public const UTF7 = 11;

    public const STRUCT = 12;

    public const MAP = 13;

    public const SET = 14;

    public const LST = 15;    // N.B. cannot use LIST keyword in PHP!

    public const UTF8 = 16;

    public const UTF16 = 17;
}
