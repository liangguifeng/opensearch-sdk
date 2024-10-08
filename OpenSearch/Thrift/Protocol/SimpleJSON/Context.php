<?php

declare(strict_types=1);

namespace Thrift\Protocol\SimpleJSON;

class Context
{
    public function write() {}

    public function isMapKey()
    {
        return false;
    }
}
