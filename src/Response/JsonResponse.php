<?php

namespace Daniel\Factory\Response;

use Daniel\Factory\Interface\ResponseInterface;

class JsonResponse implements ResponseInterface
{
    private string $data;

    public function __construct(array $data)
    {
        $this->data = json_encode($data);
    }

    public function send()
    {
        header('Content-Type: application/json');
        return $this->data;
    }
}