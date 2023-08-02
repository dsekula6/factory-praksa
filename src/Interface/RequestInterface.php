<?php

namespace Daniel\Factory\Interface;

interface RequestInterface
{
    public function getQueryParams();

    public function getParsedBody();

    public function getMethod();

    public function getUri();

    public function getPlaceholderParams();
    
    public function setPlaceholderParams(array $params);
}