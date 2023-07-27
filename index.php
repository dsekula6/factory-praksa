<?php

use Twig\Environment;
use Daniel\Factory\Class\Router;
use Twig\Loader\FilesystemLoader;
use Daniel\Factory\Class\Response;
use Daniel\Factory\Class\Request;   

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/routes.php';

$twigConfig = require 'config/twig.php';

$loader = new FilesystemLoader($twigConfig['template_dir']);
$twig = new Environment($loader, [
    'cache' => $twigConfig['cache'],
    'debug' => $twigConfig['debug'],
]);

$request = new Request($_GET, $_POST, $_SERVER['REQUEST_METHOD']);

$response = Router::resolve($request);
$response->send();
