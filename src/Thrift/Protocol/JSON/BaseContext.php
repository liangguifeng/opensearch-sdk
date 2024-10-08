<?php

declare(strict_types=1);

namespace Thrift\Protocol\JSON;

class BaseContext
{
    public function escapeNum()
    {
        return false;
    }

    public function write() {}

    public function read() {}
}
