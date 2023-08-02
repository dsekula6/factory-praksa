<?php

namespace Daniel\Factory\Class;

use Daniel\Factory\Response\Response;
use Daniel\Factory\Interface\RequestInterface;
use Daniel\Factory\Interface\ResponseInterface;

class Router
{
    private static array $routes = [];

    public static function addRoute(string $method, string $url, array $callback)
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
                [$controllerClass, $controllerMethod] = $route['callback'];
                $controller = new $controllerClass();

                $request->setPlaceholderParams($params);

                return $controller->{$controllerMethod}($request);
            }
        }

        return new Response('Page not found!');
    }

    private static function matchesUrl($routeUrl, $requestedUrl, &$params): bool
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
