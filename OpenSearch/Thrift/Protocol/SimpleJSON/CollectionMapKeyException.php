<?php

declare(strict_types=1);

namespace Thrift\Protocol\SimpleJSON;

use Thrift\Exception\TException;

class CollectionMapKeyException extends TException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
