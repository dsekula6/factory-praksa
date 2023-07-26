<?php

namespace Daniel\Factory; 

use Daniel\Factory\RequestInterface;
use Daniel\Factory\ResponseInterface;

class Router
{
    private $routes = [];

    public function addRoute(string $method, string $url, callable $callback)
    {
        $url = trim($url, '/');

        $this->routes[] = [
            'method' => $method,
            'url' => $url,
            'callback' => $callback
        ];
    }

    public function resolve(RequestInterface $request): ResponseInterface
    {
        $requestedUrl = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['url'] === $requestedUrl) {
                $callback = $route['callback'];
                return new Response($callback());
            }
        }

        return new Response('Page not found!', 404);
    }
}
