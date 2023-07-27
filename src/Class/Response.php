<?php

namespace Daniel\Factory\Class;

use Daniel\Factory\Interface\ResponseInterface;


class Response implements ResponseInterface
{
    private string $content;

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
