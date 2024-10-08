<?php

declare(strict_types=1);

namespace OpenSearch\Generated\App;

/*
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use OpenSearch\Generated\Common\OpenSearchClientException;
use OpenSearch\Generated\Common\OpenSearchException;
use OpenSearch\Generated\Common\OpenSearchResult;
use OpenSearch\Generated\Common\Pageable;

interface AppServiceIf
{
    /**
     * @param string $app
     * @return OpenSearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function save($app);

    /**
     * @param string $identity
     * @return OpenSearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function getById($identity);

    /**
     * @param Pageable $pageable
     * @return OpenSearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function listAll(Pageable $pageable);

    /**
     * @param string $identity
     * @return OpenSearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function removeById($identity);

    /**
     * @param string $identity
     * @param string $app
     * @return OpenSearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function updateById($identity, $app);

    /**
     * @param string $identity
     * @return OpenSearchResult
     * @throws OpenSearchException
     * @throws OpenSearchClientException
     */
    public function reindexById($identity);
}
