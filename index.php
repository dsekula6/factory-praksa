<?php

use Daniel\Factory\Class\Router;
use Daniel\Factory\Class\Request;   

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/routes.php';

$request = new Request();
$response = Router::resolve($request);
echo $response->send();
