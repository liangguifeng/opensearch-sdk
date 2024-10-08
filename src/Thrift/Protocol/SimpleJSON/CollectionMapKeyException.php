<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Protocol\SimpleJSON;

use OpenSearch\Thrift\Exception\TException;

class CollectionMapKeyException extends TException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
