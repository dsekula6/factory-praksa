<?php

use Daniel\Factory\Router;

$router = new Router();

$router->addRoute('GET', '/mojaruta', function() {
    return 'moja ruta';
});
$router->addRoute('GET', '', function() {
    return 'index page';
});

return $router;