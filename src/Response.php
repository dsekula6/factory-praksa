<?php

namespace Daniel\Factory;

use Daniel\Factory\ResponseInterface;

class Response implements ResponseInterface
{
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function send(): string
    {
        echo $this->content;
        return $this->content;
    }
}
