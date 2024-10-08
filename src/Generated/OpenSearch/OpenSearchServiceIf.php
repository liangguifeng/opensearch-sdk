<?php

declare(strict_types=1);

namespace OpenSearch\Generated\OpenSearch;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;

interface OpenSearchServiceIf
{
    /**
     * @param string $path
     * @param array $params
     * @param string $method
     * @return string
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function call($path, array $params, $method);
}
