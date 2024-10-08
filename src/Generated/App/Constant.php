<?php

namespace OpenSearch\Generated\App;

use Thrift\Type\TConstant;

final class Constant extends TConstant
{
    protected static $TYPE_STANDARD;

    protected static $TYPE_ADVANCE;

    protected static function init_TYPE_STANDARD()
    {
        return 'standard';
    }

    protected static function init_TYPE_ADVANCE()
    {
        return 'advance';
    }
}