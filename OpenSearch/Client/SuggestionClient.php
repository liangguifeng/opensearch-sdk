<?php

declare(strict_types=1);

namespace OpenSearch\Client;

use OpenSearch\Generated\Common\OpenSearchResult;
use OpenSearch\Generated\Suggestion\SuggestionServiceIf;
use OpenSearch\Generated\Suggestion\SuggestParams;
use OpenSearch\Util\SuggestUrlParamsBuilder;

/**
 * 应用下拉提示操作类。
 *
 * 通过制定关键词、过滤条件搜索应用的下拉提示的结果。
 */
class SuggestionClient implements SuggestionServiceIf
{
    public const SUGGESTION_API_PATH = '/suggestions/%s/actions/search';

    private $suggestionName;

    private $openSearchClient;

    /**
     * 构造方法。
     *
     * @param string $suggestionName 下拉提示名称
     * @param OpenSearchClient $openSearchClient 基础类，负责计算签名，和服务端进行交互和返回结果
     */
    public function __construct(
        string $suggestionName,
        OpenSearchClient $openSearchClient
    ) {
        $this->suggestionName = $suggestionName;
        $this->openSearchClient = $openSearchClient;
    }

    /**
     * 执行搜索操作。
     *
     * @param SuggestParams $suggestParams 指定的查询条件
     * @return OpenSearchResult OpenSearchResult类
     */
    public function execute(SuggestParams $suggestParams)
    {
        $path = $this->getPath();
        $builder = new SuggestUrlParamsBuilder($suggestParams);
        return $this->openSearchClient->get($path, $builder->getHttpParams());
    }

    /**
     * @deprecated
     */
    public function search()
    {
        throw new \BadMethodCallException();
    }

    private function getPath()
    {
        return sprintf(self::SUGGESTION_API_PATH, $this->suggestionName);
    }
}
