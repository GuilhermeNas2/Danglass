<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function addRoute($path, $callback) {
        $this->routes[$path] = $callback;
    }

    public function dispatch($requestedPath) {
        foreach ($this->routes as $path => $callback) {
            if ($path === $requestedPath) {
                return call_user_func($callback);
            }
        }
        
        header("Location: /Danglass/public/login");
    }
}
?>