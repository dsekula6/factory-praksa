<?php

namespace Daniel\Factory\Interface;

interface RequestInterface
{
    public function getQueryParams();

    public function getParsedBody();

    public function getMethod();

    public function getUri();
}