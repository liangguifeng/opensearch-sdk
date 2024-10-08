<?php

declare(strict_types=1);

namespace OpenSearch\Generated\GeneralSearcher;

class GeneralSearcherServiceClient implements GeneralSearcherServiceIf
{
    protected $input_;

    protected $output_;

    protected $seqid_ = 0;

    public function __construct($input, $output = null)
    {
        $this->input_ = $input;
        $this->output_ = $output ? $output : $input;
    }
}
