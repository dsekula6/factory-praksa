<?php

namespace Daniel\Factory;

use Daniel\Factory\RequestInterface;

class Request implements RequestInterface
{
    private $queryParams; // get
    private $parsedBody; // post
    private $method; //method

    public function __construct(array $queryParams, array $parsedBody, string $method)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
        $this->method = $method;
    }
    public function getQueryParams(string $name, $default = null)
    {
        // tu jos neka logika??
        return $this->queryParams[$name] ?? $default;
    }

    public function getParsedBody(string $name, $default = null)
    {
        return $this->parsedBody[$name] ?? $default;
    }

    public function getMethod(string $name, $default = null)
    {
        return $this->method;
    }

    
    // dodaj jos neke metode za parseanje url-a? 
    // da ne bude u resolve metodi u routeru pa zamijeni

}