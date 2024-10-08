<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\StringFunc;

interface TStringFunc
{
    public function substr($str, $start, $length = null);

    public function strlen($str);
}
