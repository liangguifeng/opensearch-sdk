<?php

declare(strict_types=1);

namespace OpenSearch\Generated\DataCollection;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;
use OpenSearch\Generated\Common\OpenSearchResult;

interface DataCollectionServiceIf
{
    /**
     * @param string $docJson
     * @param string $searchAppName
     * @param string $dataCollectionName
     * @param string $dataCollectionType
     * @return OpenSearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function push($docJson, $searchAppName, $dataCollectionName, $dataCollectionType);
}
