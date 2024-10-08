<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Suggestion;

use OpenSearch\Thrift\Type\TConstant;

final class Constant extends TConstant
{
    protected static $PARAM_QUERY;

    protected static $PARAM_HIT;

    protected static $PARAM_USER_ID;

    protected static $PARAM_RE_SEARCH;

    protected static function init_PARAM_QUERY()
    {
        return 'query';
    }

    protected static function init_PARAM_HIT()
    {
        return 'hit';
    }

    protected static function init_PARAM_USER_ID()
    {
        return 'user_id';
    }

    protected static function init_PARAM_RE_SEARCH()
    {
        return 're_search';
    }
}
