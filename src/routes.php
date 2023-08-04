<?php

use Daniel\Factory\Class\Router;
use Daniel\Factory\Controller\MealController;
use Daniel\Factory\Controller\IndexController;

Router::addRoute('GET', '/', [IndexController::class, 'indexAction']);

Router::addRoute('GET', '/mojaruta', [IndexController::class, 'mojaRutaAction']);

Router::addRoute('GET', '/api/v1/products/{productId}', [IndexController::class, 'apiV1ProductsAction']);

Router::addRoute('GET', '/api/v1/users/{userId}/posts/{postId}', [IndexController::class, 'apiV1UsersPostsAction']);

Router::addRoute('GET', '/json', [IndexController::class, 'indexJsonAction']);

Router::addRoute('GET', '/twig', [IndexController::class, 'twigAction']);

Router::addRoute('GET', '/insert', [IndexController::class, 'insertAction']);

Router::addRoute('GET', '/create', [MealController::class, 'create']);

Router::addRoute('POST', '/create', [MealController::class, 'create']);

Router::addRoute('GET', '/success', [MealController::class, 'success']);

Router::addRoute('GET', '/error', [MealController::class, 'error']);