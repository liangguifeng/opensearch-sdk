<?php

declare(strict_types=1);

namespace OpenSearch\Util;

use OpenSearch\Generated\Search\Constant;
use OpenSearch\Generated\Search\DeepPaging;
use OpenSearch\Generated\Search\RankType;

class UrlParamsBuilder
{
    public const QUERY = 'query';

    public const FORMAT = 'format';

    public const FIRST_RANK_NAME = 'first_rank_name';

    public const SECOND_RANK_NAME = 'second_rank_name';

    public const SECOND_RANK_TYPE = 'second_rank_type';

    public const SUMMARY = 'summary';

    public const FETCH_FIELDS = 'fetch_fields';

    public const QP = 'qp';

    public const DISABLE = 'disable';

    public const ROUTE_VALUE = 'route_value';

    public const SCROLL_EXPIRE = 'scroll';

    public const SCROLL_ID = 'scroll_id';

    public const SEARCH_TYPE = 'search_type';

    public const FETCH_FIELDS_SEPARATOR = ';';

    public const QP_SEPARATOR = ',';

    public const DISABLE_FUNCTIONS_SEPARATOR = ';';

    public const SUMMARY_SEPARATOR = ';';

    public const SUMMARY_SUB_SEPARATOR = ',';

    public const SUMMARY_KV_SEPARATOR = ':';

    public const SEARCH_TYPE_SCAN = 'scan';

    public const ABTEST = 'abtest';

    private static $summaryKeys = [
        'summary_field' => 'SUMMARY_PARAM_SUMMARY_FIELD',
        'summary_len' => 'SUMMARY_PARAM_SUMMARY_LEN',
        'summary_ellipsis' => 'SUMMARY_PARAM_SUMMARY_ELLIPSIS',
        'summary_snippet' => 'SUMMARY_PARAM_SUMMARY_SNIPPET',
        'summary_element' => 'SUMMARY_PARAM_SUMMARY_ELEMENT',
        'summary_element_prefix' => 'SUMMARY_PARAM_SUMMARY_ELEMENT_PREFIX',
        'summary_element_postfix' => 'SUMMARY_PARAM_SUMMARY_ELEMENT_POSTFIX',
    ];

    private $params = [];

    public function __construct($searchParams)
    {
        $this->init($searchParams);
    }

    public function init($searchParams)
    {
        $this->initQuery($searchParams);
        $this->initScroll($searchParams);
        $this->initRank($searchParams);
        $this->initFetchFields($searchParams);
        $this->initSummary($searchParams);
        $this->initQueryProcessor($searchParams);
        $this->initDisableFunctions($searchParams);
        $this->initRouteValue($searchParams);
        $this->initCustomParams($searchParams);
        $this->initAbtest($searchParams);
        $this->initUserId($searchParams);
        $this->initRawQuery($searchParams);
    }

    public function initScroll($searchParams)
    {
        if (isset($searchParams->deepPaging) && $searchParams->deepPaging instanceof DeepPaging) {
            if ($searchParams->deepPaging->scrollId) {
                $this->params[self::SCROLL_ID] = $searchParams->deepPaging->scrollId;
            } else {
                $this->params[self::SEARCH_TYPE] = self::SEARCH_TYPE_SCAN;
            }
            $this->params[self::SCROLL_EXPIRE] = $searchParams->deepPaging->scrollExpire;
        }
    }

    public function initQuery($searchParams)
    {
        $builder = new ClauseParamsBuilder($searchParams);
        $this->params[self::QUERY] = $builder->getClausesString();
    }

    public function initRank($searchParams)
    {
        if (isset($searchParams->rank->firstRankName)) {
            $this->params[self::FIRST_RANK_NAME] = $searchParams->rank->firstRankName;
        }

        if (isset($searchParams->rank->secondRankName)) {
            $this->params[self::SECOND_RANK_NAME] = $searchParams->rank->secondRankName;
        }

        if (isset($searchParams->rank->secondRankType)) {
            $enumString = RankType::$__names[$searchParams->rank->secondRankType] ?: null;
            if ($enumString) {
                $this->params[self::SECOND_RANK_TYPE] = strtolower($enumString);
            }
        }
    }

    public function initFetchFields($searchParams)
    {
        if (isset($searchParams->config->fetchFields)) {
            $this->params[self::FETCH_FIELDS] = implode(self::FETCH_FIELDS_SEPARATOR, $searchParams->config->fetchFields);
        }
    }

    public function initSummary($searchParams)
    {
        if (isset($searchParams->summaries)) {
            $summaries = [];
            foreach ($searchParams->summaries as $summary) {
                if (!isset($summary->summary_field)) {
                    continue;
                }

                $sum = [];
                foreach (self::$summaryKeys as $k => $v) {
                    if (isset($summary->{$k})) {
                        $sum[] = Constant::get($v) . self::SUMMARY_KV_SEPARATOR . $summary->{$k};
                    }
                }

                $summaries[] = implode(self::SUMMARY_SUB_SEPARATOR, $sum);
            }
            $this->params[self::SUMMARY] = implode(self::SUMMARY_SEPARATOR, $summaries);
        }
    }

    public function initQueryProcessor($searchParams)
    {
        if (isset($searchParams->queryProcessorNames)) {
            $this->params[self::QP] = implode(self::QP_SEPARATOR, $searchParams->queryProcessorNames);
        }
    }

    public function initDisableFunctions($searchParams)
    {
        if (isset($searchParams->disableFunctions)) {
            $this->params[self::DISABLE] = implode(self::DISABLE_FUNCTIONS_SEPARATOR, $searchParams->disableFunctions);
        }
    }

    public function initRouteValue($searchParams)
    {
        if (isset($searchParams->config->routeValue)) {
            $this->params[self::ROUTE_VALUE] = $searchParams->config->routeValue;
        }
    }

    public function initCustomParams($searchParams)
    {
        if (isset($searchParams->customParam)) {
            $this->params = array_merge($this->params, $searchParams->customParam);
        }
    }

    public function initAbtest($searchParams)
    {
        if (isset($searchParams->abtest)) {
            $abtestParams = [];

            if (isset($searchParams->abtest->sceneTag)) {
                $abtestParams[] = sprintf('%s:%s', Constant::get('ABTEST_PARAM_SCENE_TAG'), $searchParams->abtest->sceneTag);
            }

            if (isset($searchParams->abtest->flowDivider)) {
                $abtestParams[] = sprintf('%s:%s', Constant::get('ABTEST_PARAM_FLOW_DIVIDER'), $searchParams->abtest->flowDivider);
            }

            if (!empty($abtestParams)) {
                $this->params[self::ABTEST] = implode(',', $abtestParams);
            }
        }
    }

    public function initUserId($searchParams)
    {
        if (isset($searchParams->userId)) {
            $this->params[Constant::get('USER_ID')] = $searchParams->userId;
        }
    }

    public function initRawQuery($searchParams)
    {
        if (isset($searchParams->rawQuery)) {
            $this->params[Constant::get('RAW_QUERY')] = $searchParams->rawQuery;
        }
    }

    public function getHttpParams()
    {
        return $this->params;
    }
}
