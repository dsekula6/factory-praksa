<?php

use Daniel\Factory\Class\Router;
use Daniel\Factory\Controller\IndexController;

$indexController = new IndexController();

Router::addRoute('GET', '/', function () use ($indexController) {
    return $indexController->indexAction();
});

Router::addRoute('GET', '/mojaruta', function () use ($indexController) {
    return $indexController->mojaRutaAction();
});

Router::addRoute('GET', '/api/v1/products/{productId}', function ($params) use ($indexController) {
    return $indexController->apiV1ProductsAction($params);
});

Router::addRoute('GET', '/api/v1/users/{userId}/posts/{postId}', function ($params) use ($indexController) {
    return $indexController->apiV1UsersPostsAction($params);
});

Router::addRoute('GET', '/json', function() use ($indexController) {
    return $indexController->indexJsonAction();
});

Router::addRoute('GET', '/database', function() use ($indexController) {
    return $indexController->databaseAction();
});

Router::addRoute('GET', '/insert', function() use ($indexController) {
    return $indexController->insertAction();
});

Router::addRoute('GET', '/update', function() use ($indexController) {
    return $indexController->updateAction();
});