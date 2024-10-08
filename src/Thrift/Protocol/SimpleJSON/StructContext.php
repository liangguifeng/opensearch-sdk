<?php

declare(strict_types=1);

namespace Thrift\Protocol\SimpleJSON;

use Thrift\Protocol\TSimpleJSONProtocol;

class StructContext extends Context
{
    protected $first_ = true;

    protected $colon_ = true;

    private $p_;

    public function __construct($p)
    {
        $this->p_ = $p;
    }

    public function write()
    {
        if ($this->first_) {
            $this->first_ = false;
            $this->colon_ = true;
        } else {
            $this->p_->getTransport()->write(
                $this->colon_ ?
                TSimpleJSONProtocol::COLON :
                TSimpleJSONProtocol::COMMA
            );
            $this->colon_ = !$this->colon_;
        }
    }
}
