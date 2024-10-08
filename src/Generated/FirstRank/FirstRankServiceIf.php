<?php

declare(strict_types=1);

namespace OpenSearch\Generated\FirstRank;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;

interface FirstRankServiceIf
{
    /**
     * @param FirstRank $firstRank
     * @return FirstRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function save(FirstRank $firstRank);

    /**
     * @param string $identity
     * @return FirstRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function getById($identity);

    /**
     * @return \OpenSearch\Generated\FirstRank\FirstRank[]
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function listAll();

    /**
     * @param string $appId
     * @return \OpenSearch\Generated\FirstRank\FirstRank[]
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function listByAppId($appId);

    /**
     * @param string $appId
     * @param string $name
     * @return \OpenSearch\Generated\FirstRank\FirstRank[]
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function listByAppIdAndName($appId, $name);

    /**
     * @param string $identity
     * @param FirstRank $firstRank
     * @return FirstRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function updateById($identity, FirstRank $firstRank);

    /**
     * @param string $identity
     * @param FirstRank $firstRank
     * @return FirstRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function validateUpdateById($identity, FirstRank $firstRank);

    /**
     * @param string $identity
     * @return FirstRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function removeById($identity);
}
