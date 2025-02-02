<?php
namespace App;

class Router {
    private $routes = [];

    public function add($url, $controller, $action) {
        $this->routes[$url] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($url) {
        if (array_key_exists($url, $this->routes)) {
            $controller = $this->routes[$url]['controller'];
            $action = $this->routes[$url]['action'];
            
            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URL: $url");
        }
    }
}