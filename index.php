<?php

use Daniel\Factory\Class\Router;
use Daniel\Factory\Class\Request;   

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/routes.php';

$request = new Request($_GET, $_POST, $_SERVER['REQUEST_METHOD']);

$response = Router::resolve($request);
$response->send();
