<?php

require_once __DIR__ . '/vendor/autoload.php';

$router = require_once __DIR__ . '/src/routes.php';

$basePath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$requestUri = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $requestUri;

$router->resolve();