<?php

namespace Daniel\Factory\Class;

use Daniel\Factory\Interface\RequestInterface;

class Request implements RequestInterface
{
    private array $queryParams;
    private array $parsedBody;
    private string $method;
    private string $uri;

    public function __construct(array $queryParams, array $parsedBody, string $method)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
        $this->method = $method;
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
    
    // dodaj jos neke metode za parseanje url-a? 
    // da ne bude u resolve metodi u routeru pa zamijeni

}