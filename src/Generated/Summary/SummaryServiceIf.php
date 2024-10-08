<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Summary;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;

interface SummaryServiceIf
{
    /**
     * @param string $appId
     * @param string $group
     * @return \OpenSearch\Generated\Summary\Summary[]
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function listByAppIdAndGroup($appId, $group);
}
