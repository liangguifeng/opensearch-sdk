<?php

declare(strict_types=1);

namespace OpenSearch\Generated\DataCollection;

use OpenSearch\Thrift\Type\TConstant;

final class Constant extends TConstant
{
    protected static $DOC_KEY_CMD;

    protected static $DOC_KEY_FIELDS;

    protected static function init_DOC_KEY_CMD()
    {
        return 'cmd';
    }

    protected static function init_DOC_KEY_FIELDS()
    {
        return 'fields';
    }
}
