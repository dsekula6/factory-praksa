<?php

namespace Daniel\Factory\Controller;

use Daniel\Factory\Class\Request;
use Daniel\Factory\Model\MyModel;
use Daniel\Factory\Class\Connection;
use Daniel\Factory\Response\Response;
use Daniel\Factory\Response\JsonResponse;
use Daniel\Factory\Response\TwigResponse;

class IndexController
{
    public function indexAction()
    {
        return new Response('<html><head></head><body><h1>hello</h1>index ruta</body></html>');
    }

    public function indexJsonAction()
    {
        $jsonData = ['message' => 'JSON response!', '2' => 'two'];
        return new JsonResponse($jsonData);
    }

    public function mojaRutaAction()
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
        $vijest->naslov = 'promijenjeni naslov';
        $vijest->update();
        // $vijest2 = MyModel::find('5');
        // $vijest2->softDelete();
        return new Response('moja ruta');
    }
    public function insertAction()
    {
        $vijest = new MyModel(
                [
                    'naslov' => 'insert1',
                    'sazetak' => 'sazetak moja ruta',
                    'datum' => '02.02.2023.',
                    'tekst' => 'moja ruta tekst',
                    'slika' => 'a',
                    'kategorija' => 'a',
                    'arhiva' => 0,
                ]);
        $vijest->save();
        return new Response('inserted');
    }

    public function apiV1ProductsAction(Request $request)
    {
        $params = $request->getPlaceholderParams();
        $productId = $params['productId'];
        return new Response($productId);
    }

    public function apiV1UsersPostsAction(Request $request)
    {
        $params = $request->getPlaceholderParams();
        $query = json_encode($request->getQueryParams());
        return new Response(json_encode($params).'\n'.$query);
    }
    
    public function twigAction()
    {
        return new TwigResponse('index.html.twig', ['key1' => 'value1']);
    }
}
