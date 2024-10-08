<?php

declare(strict_types=1);

namespace OpenSearch\Util;

use OpenSearch\Generated\Suggestion\Constant;
use OpenSearch\Generated\Suggestion\ReSearch;
use OpenSearch\Generated\Suggestion\SuggestParams;

/**
 * 下拉提示请求参数构建器.
 */
class SuggestUrlParamsBuilder
{
    private $params = [];

    public function __construct(SuggestParams $suggestParams)
    {
        $this->init($suggestParams);
    }

    public function init(SuggestParams $suggestParams)
    {
        $this->initQuery($suggestParams);
        $this->initHits($suggestParams);
        $this->initUserId($suggestParams);
        $this->initReSearch($suggestParams);
        $this->initCustomParams($suggestParams);
    }

    public function initQuery($suggestParams)
    {
        if (isset($suggestParams->query)) {
            $this->params[Constant::get('PARAM_QUERY')] = $suggestParams->query;
        }
    }

    public function initHits($suggestParams)
    {
        if (isset($suggestParams->hits)) {
            $this->params[Constant::get('PARAM_HIT')] = $suggestParams->hits;
        }
    }

    public function initUserId($suggestParams)
    {
        if (isset($suggestParams->userId)) {
            $this->params[Constant::get('PARAM_USER_ID')] = $suggestParams->userId;
        }
    }

    public function initReSearch($suggestParams)
    {
        if (isset($suggestParams->reSearch)) {
            $enumString = ReSearch::$__names[$suggestParams->reSearch] ?: null;
            if ($enumString) {
                $this->params[Constant::get('PARAM_RE_SEARCH')] = strtolower($enumString);
            }
        }
    }

    public function initCustomParams($suggestParams)
    {
        if (isset($suggestParams->customParams)) {
            $this->params = array_merge($this->params, $suggestParams->customParams);
        }
    }

    public function getHttpParams()
    {
        return $this->params;
    }
}
