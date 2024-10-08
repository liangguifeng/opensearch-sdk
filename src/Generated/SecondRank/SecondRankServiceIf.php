<?php

declare(strict_types=1);

namespace OpenSearch\Generated\SecondRank;

use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;

interface SecondRankServiceIf
{
    /**
     * @param SecondRank $secondRank
     * @return SecondRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function save(SecondRank $secondRank);

    /**
     * @return \OpenSearch\Generated\SecondRank\SecondRank[]
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function listAll();

    /**
     * @param string $id
     * @return SecondRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function getById($id);

    /**
     * @param string $appId
     * @param string $name
     * @return \OpenSearch\Generated\SecondRank\SecondRank[]
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function listByAppIdAndName($appId, $name);

    /**
     * @param string $id
     * @param SecondRank $secondRank
     * @return SecondRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function updateById($id, SecondRank $secondRank);

    /**
     * @param string $id
     * @return SecondRank
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function removeById($id);
}
