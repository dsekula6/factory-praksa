<?php

use Daniel\Factory\Class\Router;

Router::addRoute('GET', '/mojaruta', function() {
    return 'moja ruta';
});

Router::addRoute('GET', '/', function() {
    return 'index page';
});