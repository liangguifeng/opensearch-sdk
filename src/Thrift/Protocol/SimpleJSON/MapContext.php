<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Protocol\SimpleJSON;

class MapContext extends StructContext
{
    protected $isKey = true;

    private $p_;

    public function __construct($p)
    {
        parent::__construct($p);
    }

    public function write()
    {
        parent::write();
        $this->isKey = !$this->isKey;
    }

    public function isMapKey()
    {
        // we want to coerce map keys to json strings regardless
        // of their type
        return $this->isKey;
    }
}
