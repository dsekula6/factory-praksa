<?php

use Daniel\Factory\Router;

$router = new Router();

$router->addRoute('GET', '/mojaruta', function() {
    echo "Moja ruta";
});
$router->addRoute('GET', '/', function() {
    echo "index page";
});

return $router;