<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Document;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;
use OpenSearch\Generated\Common\OpenSearchResult;

interface DocumentServiceIf
{
    /**
     * @param string $docsJson
     * @param string $appName
     * @param string $tableName
     * @return OpenSearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function push($docsJson, $appName, $tableName);
}
