<?php

require_once __DIR__ . '/vendor/autoload.php';

$router = require_once __DIR__ . '/src/routes.php';

$router->resolve();
