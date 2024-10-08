<?php

declare(strict_types=1);

namespace OpenSearch\Client;

use OpenSearch\Generated\Common\OpenSearchResult;
use OpenSearch\Generated\DataCollection\Command;
use OpenSearch\Generated\DataCollection\Constant;
use OpenSearch\Generated\DataCollection\DataCollectionServiceIf;

/**
 * 数据采集文档推送类。
 *
 * 管理搜索应用的数据采集文档推送，包含单条推送文档、批量推送文档等。
 */
class DataCollectionClient implements DataCollectionServiceIf
{
    private $openSearchClient;

    private $docBuffer = [];

    /**
     * 构造方法。
     *
     * @param OpenSearchClient $openSearchClient 基础类，负责计算签名，和服务端进行交互和返回结果
     */
    public function __construct($openSearchClient)
    {
        $this->openSearchClient = $openSearchClient;
    }

    /**
     * 增加一条文档。
     *
     * > Note:
     * >
     * > 这条文档只是增加到 SDK Client buffer 中，没有正式提交到服务端；只有调用了 commit 方法才会被提交到服务端。
     * > 你可以多次 add 然后调用 commit() 统一提交。
     *
     * @param array $fields 一条行为数据(或用户数据、物品数据)文档的所有字段，例如array("user_id" => "1021468", "bhv_type" => "click");
     * @return OpenSearchResult
     */
    public function add(array $fields = [])
    {
        $record = array_merge(self::getInternalFields(), $fields);
        $doc = [
            Constant::get('DOC_KEY_CMD') => Command::$__names[Command::ADD],
            Constant::get('DOC_KEY_FIELDS') => $record,
        ];

        $this->docBuffer[] = $doc;
    }

    /**
     * 把 SDK Client buffer 中的文档发布到服务端。
     *
     * > Note:
     * >
     * > 在发送之前会把 buffer 中的文档清空，所以如果服务端返回错误需要重试的情况下，需要重新生成文档并 commit，避免丢数据的可能。
     *
     * @param string $searchAppName 关联的搜索应用名
     * @param string $dataCollectionName 数据采集名称，开通时控制台会返回该名称
     * @param string $dataCollectionType 数据采集类型：user、item_info、behavior、industry_specific
     * @return OpenSearchResult
     */
    public function commit($searchAppName, $dataCollectionName, $dataCollectionType)
    {
        $docJson = json_encode($this->docBuffer);
        $this->docBuffer = [];
        return $this->doPush($docJson, $searchAppName, $dataCollectionName, $dataCollectionType);
    }

    /**
     * 批量推送文档。
     *
     * > Note：
     * >
     * > 此操作会同步发送文档到服务端。
     *
     * @param string $docJson 文档 list，为 JSON 格式
     * @param string $searchAppName 关联的搜索应用名
     * @param string $dataCollectionName 数据采集名称，开通时控制台会返回该名称
     * @param string $dataCollectionType 数据采集类型：user、item_info、behavior、industry_specific
     * @return OpenSearchResult
     */
    public function push($docJson, $searchAppName, $dataCollectionName, $dataCollectionType)
    {
        $docs = json_decode($docJson, true);
        foreach ($docs as &$doc) {
            $fieldsName = Constant::get('DOC_KEY_FIELDS');
            $doc[$fieldsName] = array_merge(self::getInternalFields(), $doc[$fieldsName]);
        }

        return $this->doPush(json_encode($docs), $searchAppName, $dataCollectionName, $dataCollectionType);
    }

    private function doPush($docJson, $searchAppName, $dataCollectionName, $dataCollectionType)
    {
        $path = self::createPushPath($searchAppName, $dataCollectionName, $dataCollectionType);
        return $this->openSearchClient->post($path, $docJson);
    }

    private static function createPushPath($searchAppName, $dataCollectionName, $dataCollectionType)
    {
        return sprintf('/app-groups/%s/data-collections/%s/data-collection-type/%s/actions/bulk', $searchAppName, $dataCollectionName, $dataCollectionType);
    }

    private static function getInternalFields()
    {
        return [
            'sdk_type' => OpenSearchClient::SDK_TYPE,
            'sdk_version' => OpenSearchClient::SDK_VERSION,
            'reach_time' => date('YmdHis', time()),
        ];
    }
}
