<?php

namespace Daniel\Factory; 

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

    public function resolve()
    {
        $requestedUrl = trim($_SERVER['REQUEST_URI'], '/');
        $method = $_SERVER['REQUEST_METHOD'];

        // xampp
        
        if (strpos($requestedUrl, 'index.php/') !== false) {
            $requestedUrl = str_replace(['index.php/'], "", [$requestedUrl])[0];
        }
        else if (strpos($requestedUrl, 'index.php') !== false) {
            $requestedUrl = str_replace(['index.php'], "", [$requestedUrl])[0];
        }
    
        // Loop for match
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['url'] === $requestedUrl) {
                $callback = $route['callback'];
                $callback();
                exit();
            }
        }
        http_response_code(404);
        echo 'Page not found!';
    }
}
