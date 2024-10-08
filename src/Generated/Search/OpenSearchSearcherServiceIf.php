<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;
use OpenSearch\Generated\GeneralSearcher\GeneralSearcherServiceIf;
use OpenSearch\Generated\GeneralSearcher\SearchResult;

interface OpenSearchSearcherServiceIf extends GeneralSearcherServiceIf
{
    /**
     * @param SearchParams $searchParams
     * @return SearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function execute(SearchParams $searchParams);
}
