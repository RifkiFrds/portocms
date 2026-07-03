<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $path, string $handler): void {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, string $handler): void {
        $this->addRoute('POST', $path, $handler);
    }

    private function addRoute(string $method, string $path, string $handler): void {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch(string $uri, string $method): void {
        // Strip query string
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        $uri = '/' . trim($uri, '/');

        foreach ($this->routes as $route) {
            // Simple match or can implement placeholder matches if needed.
            // For now, exact matching is sufficient for Phase 1.
            $routePath = '/' . trim($route['path'], '/');
            if ($route['method'] === $method && $routePath === $uri) {
                list($controllerClass, $action) = explode('@', $route['handler']);
                
                $controllerClass = "App\\Controllers\\{$controllerClass}";
                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    if (method_exists($controller, $action)) {
                        $controller->$action();
                        return;
                    }
                }
            }
        }

        // Handle 404
        http_response_code(404);
        view('404');
    }
}
