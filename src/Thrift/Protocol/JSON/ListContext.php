<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Protocol\JSON;

use OpenSearch\Thrift\Protocol\TJSONProtocol;

class ListContext extends BaseContext
{
    private $first_ = true;

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
            $this->p_->getTransport()->write(TJSONProtocol::COMMA);
        }
    }

    public function read()
    {
        if ($this->first_) {
            $this->first_ = false;
        } else {
            $this->p_->readJSONSyntaxChar(TJSONProtocol::COMMA);
        }
    }
}
