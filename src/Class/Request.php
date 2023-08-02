<?php

namespace Daniel\Factory\Class;

use Daniel\Factory\Interface\RequestInterface;

class Request implements RequestInterface
{
    private array $queryParams;
    private array $parsedBody;
    private string $method;
    private string $uri;
    private array $urlParams = [];

    public function __construct()
    {
        $this->queryParams = $_GET;
        $this->parsedBody = $_POST;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function getParsedBody()
    {
        return $this->parsedBody;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUri()
    {
        return $this->uri;
    }
    
    public function getPlaceholderParams(): array
    {
        return $this->urlParams;
    }

    public function setPlaceholderParams(array $params): void
    {
        $this->urlParams = $params;
    }

}