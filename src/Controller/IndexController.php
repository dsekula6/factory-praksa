<?php

namespace Daniel\Factory\Controller;


use Daniel\Factory\Class\Response;
use Daniel\Factory\Class\Connection;
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

    public function databaseAction()
    {
        $db = Connection::getInstance();

        $query = "SELECT * FROM meal WHERE category_id = :category";
        $params = ['category' => 251];
        $result = $db->fetchAssoc($query, $params);

        $query2 = "SELECT * FROM meal WHERE category_id = ?";
        $params2 = [251];
        $result2 = $db->fetchAssocAll($query2, $params2);

        return new Response(json_encode($result) . '<br><br>' . json_encode($result2));
    }
    public function insertAction()
    {
        $db = Connection::getInstance();

        $data = [
            'naslov' => 'test naslov',
            'sazetak' => 'sazetak asfsgfsg f fs idl sjdf',
            'datum' => '01.01.2023.',
            'tekst' => 'sggdsfdaff',
            'slika' => 'a',
            'kategorija' => 'a',
            'arhiva' => 0,
        ];
        $table = 'vijesti';
        
        return new Response($db->insert($table, $data));

    }
    public function updateAction()
    {
        $db = Connection::getInstance();

        $dataToUpdate = [
            'id' => 5,
            'naslov' => 'updateani naslov',
            'sazetak' => 'updateani sazetak asfsgfsg f fs idl sjdf',
            'datum' => '01.01.2023.',
            'tekst' => 'sggdsfdaff',
            'slika' => 'a',
            'kategorija' => 'a',
            'arhiva' => 0,
        ];
        $table = 'vijesti';

        $success = $db->update($table, $dataToUpdate);
        if ($success) {
            return new Response("Update successful");
        } else {
            return new Response("Update failed");
        }

    }
    
}
