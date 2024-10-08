<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Suggestion;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;
use OpenSearch\Generated\GeneralSearcher\SearchResult;

interface SuggestionServiceIf
{
    /**
     * @param SuggestParams $suggestParams
     * @return SearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function execute(SuggestParams $suggestParams);

    /**
     * @return string
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function search();
}
