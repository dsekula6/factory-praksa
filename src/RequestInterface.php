<?php

namespace Daniel\Factory;

interface RequestInterface
{
    public function getQueryParams(string $name, $default = null);

    public function getParsedBody(string $name, $default = null);

    public function getMethod(string $name, $default = null);
}