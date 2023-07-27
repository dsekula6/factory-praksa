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
            if ($route['method'] === $method && self::matchesUrl($route['url'], $requestedUrl, $params)) {
                $callback = $route['callback'];
                return $callback($params);
            }
        }

        return new Response('Page not found!');
    }

    private static function matchesUrl($routeUrl, $requestedUrl, &$params)
    {
        $routeUrlParts = explode('/', trim($routeUrl, '/'));
        $requestedUrlParts = explode('/', trim($requestedUrl, '/'));
        
        if (count($routeUrlParts) !== count($requestedUrlParts)) {
            return false;
        }

        $params = [];

        foreach ($routeUrlParts as $key => $part) {
            if (strpos($part, '{') === 0 && strrpos($part, '}') === strlen($part) - 1) {
                $paramName = substr($part, 1, -1);
                $params[$paramName] = $requestedUrlParts[$key];
            } else {
                if ($part !== $requestedUrlParts[$key]) {
                    return false;
                }
            }
        }

        return true;
    }
}
