<?php

require_once __DIR__ . '/vendor/autoload.php';

use Daniel\Factory\Request;
use Daniel\Factory\Router;
use Daniel\Factory\Response;

$router = require_once __DIR__ . '/src/routes.php';

$request = new Request($_GET, $_POST, $_SERVER['REQUEST_METHOD']);

// echo $request->getQueryParams("id");
// echo $router->resolve($request);

$response = $router->resolve($request);
$response->send();
