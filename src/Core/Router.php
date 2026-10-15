<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function route($uri, $method)
    {
        $uriHasId = (bool)preg_match('/\/\d+$/', $uri); // check if uri has id at the end
        if ($uriHasId) { //for requests like /logs/{id}
            $id = $this->extractIdFromUri($uri);
            $uri = preg_replace('/\/\d+$/', '/{id}', $uri); // replace id with {id}
        }
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                if ($uriHasId) {
                    $route['controller']->{$route['controllerMethod']}($id);
                } else {
                    $route['controller']->{$route['controllerMethod']}();
                }
                return;
            }
        }
        return false; // change to exception todo
    }

    public function add($uri, $controller, $controllerMethod, $method)
    {
        $this->routes[] = ['uri' => $uri, 'controller' => $controller, 'controllerMethod' => $controllerMethod, 'method' => $method];
    }

    public function get($uri, $controller, $controllerMethod)
    {
        $this->add($uri, $controller, $controllerMethod, 'GET');
    }

    public function post($uri, $controller, $controllerMethod)
    {
        $this->add($uri, $controller, $controllerMethod, 'POST');
    }

    public function put($uri, $controller, $controllerMethod)
    {
        $this->add($uri, $controller, $controllerMethod, 'PUT');
    }

    public function delete($uri, $controller, $controllerMethod)
    {
        $this->add($uri, $controller, $controllerMethod, 'DELETE');
    }

    private function extractIdFromUri($uri)
    {
        $parts = explode('/', trim($uri, '/')); // split the uri into parts
        return end($parts); // extract the id from uri
    }
}