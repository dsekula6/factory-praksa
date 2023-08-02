<?php

namespace Daniel\Factory\Controller;


use Daniel\Factory\Class\Response;
use Daniel\Factory\Class\Connection;
use Daniel\Factory\Class\JsonResponse;
use Daniel\Factory\Class\Model;
use Daniel\Factory\Class\MyModel;
use Daniel\Factory\Class\TwigResponse;

class IndexController
{
    public static function indexAction()
    {
        return new Response('<html><head></head><body><h1>ola</h1>index ruta</body></html>');
    }

    public static function indexJsonAction()
    {
        $jsonData = ['message' => 'JSON response!', '2' => 'two'];
        return new JsonResponse($jsonData);
    }

    public static function mojaRutaAction()
    {
        $vijest = new MyModel(
            [
                'naslov' => 'moja ruta',
                'sazetak' => 'sazetak moja ruta',
                'datum' => '02.02.2023.',
                'tekst' => 'moja ruta tekst',
                'slika' => 'a',
                'kategorija' => 'a',
                'arhiva' => 0,
            ]
        );
        $vijest->save();
        // $vijest = MyModel::find(13);
        $vijest->naslov = 'promijenjeni naslov';
        $vijest->update();
        return new Response('moja ruta');
    }

    public static function apiV1ProductsAction($params)
    {
        $productId = $params['productId'];
        return new Response($productId);
    }

    public static function apiV1UsersPostsAction($params)
    {
        $userId = $params['userId'];
        $postId = $params['postId'];
        return new Response($userId . ' ' . $postId);
    }
    
    public static function twigAction()
    {
        return new TwigResponse('index.html.twig', ['key1' => 'value1']);
    }
}
