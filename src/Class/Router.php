<?php

namespace Daniel\Factory\Class; 

use Daniel\Factory\Interface\RequestInterface;
use Daniel\Factory\Interface\ResponseInterface;

class Router
{
    private static $routes = [];

    public static function addRoute(string $method, string $url, callable $callback)
    {
        self::$routes[] = [
            'method' => $method,
            'url' => $url,
            'callback' => $callback
        ];
    }

    public static function resolve(RequestInterface $request): ResponseInterface
    {
        $requestedUrl = parse_url($request->getUri(), PHP_URL_PATH);
        $method = $request->getMethod();

        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['url'] === $requestedUrl) {
                $callback = $route['callback'];
                return new Response($callback());
            }
        }

        return new Response('Page not found!', 404);
    }
}