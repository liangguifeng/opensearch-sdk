<?php

declare(strict_types=1);

namespace Thrift\Protocol\SimpleJSON;

use Thrift\Protocol\TSimpleJSONProtocol;

class ListContext extends Context
{
    protected $first_ = true;

    private $p_;

    public function __construct($p)
    {
        $this->p_ = $p;
    }

    public function write()
    {
        if ($this->first_) {
            $this->first_ = false;
        } else {
            $this->p_->getTransport()->write(TSimpleJSONProtocol::COMMA);
        }
    }
}
