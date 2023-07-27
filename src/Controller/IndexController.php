<?php

namespace Daniel\Factory\Controller;

use Daniel\Factory\Class\Response;
use Daniel\Factory\Class\JsonResponse;

class IndexController
{
    public function indexAction()
    {
        return new Response('<html><head></head><body><h1>ola</h1>moja ruta</body></html>');
    }

    public function indexJsonAction()
    {
        $jsonData = ['message' => 'JSON response!', '2' => 'two'];
        return new JsonResponse($jsonData);
    }

    public function mojaRutaAction()
    {
        return new Response('moja ruta');
    }

    public function apiV1ProductsAction($params)
    {
        $productId = $params['productId'];
        return new Response($productId);
    }

    public function apiV1UsersPostsAction($params)
    {
        $userId = $params['userId'];
        $postId = $params['postId'];
        return new Response($userId . ' ' . $postId);
    }
}
