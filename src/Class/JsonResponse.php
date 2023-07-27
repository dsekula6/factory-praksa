<?php

namespace Daniel\Factory\Class;

use Daniel\Factory\Interface\ResponseInterface;

class JsonResponse implements ResponseInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function send()
    {
        header('Content-Type: application/json');
        echo json_encode($this->data);
    }
}