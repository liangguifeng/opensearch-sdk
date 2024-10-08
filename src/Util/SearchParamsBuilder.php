<?php

declare(strict_types=1);

namespace OpenSearch\Util;

use OpenSearch\Generated\Search\Abtest;
use OpenSearch\Generated\Search\Aggregate;
use OpenSearch\Generated\Search\Config;
use OpenSearch\Generated\Search\DeepPaging;
use OpenSearch\Generated\Search\Distinct;
use OpenSearch\Generated\Search\RankType;
use OpenSearch\Generated\Search\SearchFormat;
use OpenSearch\Generated\Search\SearchParams;
use OpenSearch\Generated\Search\Sort;
use OpenSearch\Generated\Search\SortField;
use OpenSearch\Generated\Search\Summary;

/**
 * 搜索配置项。
 */
class SearchParamsBuilder
{
    public const SORT_INCREASE = 1;

    public const SORT_DECREASE = 0;

    private $searchParams;

    public function __construct($opts = [])
    {
        $config = new Config();
        $this->searchParams = new SearchParams(['config' => $config]);

        if (isset($opts['start'])) {
            $this->setStart($opts['start']);
        }

        if (isset($opts['hits'])) {
            $this->setHits($opts['hits']);
        }

        if (isset($opts['format'])) {
            $this->setFormat($opts['format']);
        }

        if (isset($opts['appName'])) {
            $this->setAppName($opts['appName']);
        }

        if (isset($opts['query'])) {
            $this->setQuery($opts['query']);
        }

        if (isset($opts['kvpairs'])) {
            $this->setKvPairs($opts['kvpairs']);
        }

        if (isset($opts['fetchFields'])) {
            $this->setFetchFields($opts['fetchFields']);
        }

        if (isset($opts['routeValue'])) {
            $this->setRouteValue($opts['routeValue']);
        }

        if (isset($opts['customConfig']) && is_array($opts['customConfig'])) {
            foreach ($opts['customConfig'] as $k => $v) {
                $this->setCustomConfig($k, $v);
            }
        }

        if (isset($opts['filter'])) {
            $this->setFilter($opts['filter']);
        }

        if (isset($opts['sort']) && is_array($opts['sort'])) {
            foreach ($opts['sort'] as $sort) {
                if (!isset($sort['order'])) {
                    $sort['order'] = self::SORT_DECREASE;
                }
                $this->addSort($sort['field'], $sort['order']);
            }
        }

        if (isset($opts['firstRankName'])) {
            $this->setFirstRankName($opts['firstRankName']);
        }

        if (isset($opts['secondRankName'])) {
            $this->setSecondRankName($opts['secondRankName']);
        }

        if (array_key_exists('secondRankType', $opts)) {
            $this->setSecondRankType($opts['secondRankType']);
        }

        if (isset($opts['aggregate'], $opts['aggregate']['groupKey'])) {
            $this->addAggregate($opts['aggregate']);
        } elseif (isset($opts['aggregate'], $opts['aggregate'][0])) {
            foreach ($opts['aggregate'] as $aggregate) {
                $this->addAggregate($aggregate);
            }
        }

        if (isset($opts['distinct'], $opts['distinct'][0])) {
            foreach ($opts['distinct'] as $distinct) {
                $this->addDistinct($distinct);
            }
        } elseif (isset($opts['distinct'], $opts['distinct']['key'])) {
            $this->addDistinct($opts['distinct']);
        }

        if (isset($opts['summaries'])) {
            foreach ($opts['summaries'] as $summary) {
                $this->addSummary($summary);
            }
        }

        if (isset($opts['qp'])) {
            if (!is_array($opts['qp'])) {
                $opts['qp'] = [$opts['qp']];
            }
            foreach ($opts['qp'] as $qp) {
                $this->addQueryProcessor($qp);
            }
        }

        if (isset($opts['disableFunctions']) && is_array($opts['disableFunctions'])) {
            foreach ($opts['disableFunctions'] as $fun) {
                $this->addDisableFunctions($fun);
            }
        } elseif (isset($opts['disableFunctions'])) {
            $this->addDisableFunctions($opts['disableFunctions']);
        }

        if (isset($opts['customParams'])) {
            foreach ($opts['customParams'] as $key => $value) {
                $this->setCustomParam($key, $value);
            }
        }

        if (isset($opts['reRankSize'])) {
            $this->setReRankSize($opts['reRankSize']);
        }
    }

    /**
     * 设置返回结果的偏移量。
     *
     * @param int $start 偏移量，范围[0,5000]
     */
    public function setStart($start)
    {
        $this->searchParams->config->start = (int) $start;
    }

    /**
     * 设置返回结果的条数。
     *
     * @param int $hits 返回结果的条数，范围[0,500]
     */
    public function setHits($hits)
    {
        $this->searchParams->config->hits = $hits;
    }

    /**
     * 设置返回结果的格式。
     *
     * @param string $format 返回结果的格式，有json、fulljson和xml格式
     */
    public function setFormat($format)
    {
        $upperFormat = strtoupper($format);
        $this->searchParams->config->searchFormat = array_search($upperFormat, SearchFormat::$__names);
    }

    /**
     * 设置要搜索的应用名称或ID。
     *
     * @param string $appName 指定要搜索的应用名称或ID
     * @param mixed $appNames
     */
    public function setAppName($appNames)
    {
        $this->searchParams->config->appNames = is_array($appNames) ? $appNames : [$appNames];
    }

    /**
     * 设置搜索关键词。
     *
     * @param string $query 设置的搜索关键词，格式为：索引名:'关键词' [AND|OR ...]
     */
    public function setQuery($query)
    {
        $this->searchParams->query = $query;
    }

    /**
     * 添加搜索关键词。
     *
     * @param String $query 设置的搜索关键词
     * @param String $condition 两个过滤条件的连接符, 例如AND OR等。
     * @return void
     */
    public function addQuery($query, $condition = 'AND')
    {
        if ($this->searchParams->query == null) {
            $this->searchParams->query = $query;
        } else {
            $this->searchParams->query .= " {$condition} $query";
        }
    }

    /**
     * 设置KVpairs。
     *
     * @param string $kvPairs 设置kvpairs
     */
    public function setKvPairs($kvPairs)
    {
        $this->searchParams->config->kvpairs = $kvPairs;
    }

    /**
     * 设置结果集的返回字段。
     *
     * @param array $fetchFields 指定的返回字段的列表，例如array('a', 'b')
     */
    public function setFetchFields($fetchFields)
    {
        $this->searchParams->config->fetchFields = $fetchFields;
    }

    /**
     * 如果分组查询时，指定分组的值。
     *
     * @param mixed $routeValue 分组字段值
     */
    public function setRouteValue($routeValue)
    {
        $this->searchParams->config->routeValue = $routeValue;
    }

    /**
     * 设置参与精排个数。
     *
     * @param int $reRankSize 参与精排个数，范围[0,2000]
     */
    public function setReRankSize($reRankSize)
    {
        $this->searchParams->rank->reRankSize = $reRankSize;
    }

    /**
     * 在Config字句中增加自定义的参数。
     *
     * @param string $key 设定自定义参数名
     * @param mixed $value 设定自定义参数值
     */
    public function setCustomConfig($key, $value)
    {
        if ($this->searchParams->config->customConfig == null) {
            $this->searchParams->config->customConfig = [];
        }

        $this->searchParams->config->customConfig[$key] = $value;
    }

    /**
     * 添加过滤条件。
     *
     * @param string $filter 过滤，例如a>1
     * @param string $condition 两个过滤条件的连接符, 例如AND OR等
     */
    public function addFilter($filter, $condition = 'AND')
    {
        if ($this->searchParams->filter == null) {
            $this->searchParams->filter = $filter;
        } else {
            $this->searchParams->filter .= " {$condition} {$filter}";
        }
    }

    /**
     * 设置过滤条件。
     *
     * @param string $filterSting 过滤，例如a>1 OR b<2
     * @param mixed $filterString
     */
    public function setFilter($filterString)
    {
        $this->searchParams->filter = $filterString;
    }

    /**
     * 添加排序规则。
     *
     * @param string $field 排序字段
     * @param int $sort 排序策略，有降序0或者升序1，默认降序
     * @param mixed $order
     */
    public function addSort($field, $order = self::SORT_DECREASE)
    {
        if ($this->searchParams->sort == null) {
            $this->searchParams->sort = new Sort();
            $this->searchParams->sort->sortFields = [];
        }
        $sortField = new SortField(['field' => $field, 'order' => $order]);
        $this->searchParams->sort->sortFields[] = $sortField;
    }

    /**
     * 设置粗排表达式名称。
     *
     * @param string $firstRankName 指定的粗排表达式名称
     */
    public function setFirstRankName($firstRankName)
    {
        $this->searchParams->rank->firstRankName = $firstRankName;
    }

    /**
     * 设置精排表达式名称。
     *
     * @param string $secondRankName 指定的精排表达式名称
     */
    public function setSecondRankName($secondRankName)
    {
        $this->searchParams->rank->secondRankName = $secondRankName;
    }

    /**
     * 设置精排表达式类型。
     *
     * @param RankType $secondRankType 指定的精排表达式类型
     */
    public function setSecondRankType($secondRankType)
    {
        $this->searchParams->rank->secondRankType = $secondRankType;
    }

    /**
     * 设置聚合配置。
     *
     * @param array $agg 指定的聚合配置
     */
    public function addAggregate($agg)
    {
        $aggregate = new Aggregate($agg);
        if ($this->searchParams->aggregates == null) {
            $this->searchParams->aggregates = [];
        }
        $this->searchParams->aggregates[] = $aggregate;
    }

    /**
     * 设置去重配置。
     *
     * @param array $dist 指定的去重配置
     */
    public function addDistinct($dist)
    {
        $distinct = new Distinct($dist);
        if ($this->searchParams->distincts == null) {
            $this->searchParams->distincts = [];
        }
        $this->searchParams->distincts[] = $distinct;
    }

    /**
     * 设置搜索结果摘要配置。
     *
     * @param array $summaryMeta 指定的摘要字段配置
     */
    public function addSummary($summaryMeta)
    {
        $summary = new Summary($summaryMeta);
        if ($this->searchParams->summaries == null) {
            $this->searchParams->summaries = [];
        }

        $this->searchParams->summaries[] = $summary;
    }

    /**
     * 添加查询分析配置。
     *
     * @param array $qpName 指定的QP名称
     */
    public function addQueryProcessor($qpName)
    {
        if ($this->searchParams->queryProcessorNames == null) {
            $this->searchParams->queryProcessorNames = [];
        }

        $this->searchParams->queryProcessorNames[] = $qpName;
    }

    /**
     * 添加要关闭的function。
     *
     * @param string $disabledFunction 指定的要关闭的方法名称
     */
    public function addDisableFunctions($disabledFunction)
    {
        if ($this->searchParams->disableFunctions == null) {
            $this->searchParams->disableFunctions = [];
        }

        $this->searchParams->disableFunctions[] = $disabledFunction;
    }

    /**
     * 设置自定义参数。
     *
     * @param string $key 自定义参数的参数名
     * @param string $value 自定义参数的参数值
     */
    public function setCustomParam($key, $value)
    {
        if ($this->searchParams->customParam == null) {
            $this->searchParams->customParam = [];
        }

        $this->searchParams->customParam[$key] = $value;
    }

    /**
     * 设置扫描数据的过期时间。
     *
     * @param string $expireTime 设定scroll的过期时间
     * @param mixed $expiredTime
     */
    public function setScrollExpire($expiredTime)
    {
        if ($this->searchParams->deepPaging == null) {
            $this->searchParams->deepPaging = new DeepPaging();
        }

        $this->searchParams->deepPaging->scrollExpire = $expiredTime;
    }

    /**
     * 设置扫描数据的scrollId。
     *
     * ScrollId 为上一次扫描时返回的信息。
     *
     * @param string $scrollId 设定scroll的scrollId
     */
    public function setScrollId($scrollId)
    {
        if ($this->searchParams->deepPaging == null) {
            $this->searchParams->deepPaging = new DeepPaging();
        }

        $this->searchParams->deepPaging->scrollId = $scrollId;
    }

    /**
     * 设置abtest数据的sceneTag。
     *
     * SceneTag 为场景标签。
     *
     * @param string $sceneTag 设定abtest的sceneTag
     */
    public function setSceneTag($sceneTag)
    {
        if ($this->searchParams->abtest == null) {
            $this->searchParams->abtest = new Abtest();
        }

        $this->searchParams->abtest->sceneTag = $sceneTag;
    }

    /**
     * 设置abtest数据的flowDivider。
     *
     * FlowDivider 为流量分配标识。
     *
     * @param string $flowDivider 设定abtest的flowDivider
     */
    public function setFlowDivider($flowDivider)
    {
        if ($this->searchParams->abtest == null) {
            $this->searchParams->abtest = new Abtest();
        }

        $this->searchParams->abtest->flowDivider = $flowDivider;
    }

    /**
     * 设置终端用户的id，用来统计uv信息。
     *
     * @param string $userId 设定终端用户的id
     */
    public function setUserId($userId)
    {
        $this->searchParams->userId = $userId;
    }

    /**
     * 设置终端用户输入的query。
     *
     * @param string $rawQuery 设定终端用户输入的query
     */
    public function setRawQuery($rawQuery)
    {
        $this->searchParams->rawQuery = $rawQuery;
    }

    /**
     * 获取SearchParams对象。
     *
     * @return SearchParams
     */
    public function build()
    {
        return $this->searchParams;
    }
}
