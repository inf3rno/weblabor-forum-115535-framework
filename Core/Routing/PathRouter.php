<?php

namespace Core\Routing;

class PathRouter implements Router
{
    protected $routes = array();

    public function route($path, $callback)
    {
        $this->routes[$path] = $callback;
    }

    public function dispatch($url)
    {
        foreach ($this->routes as $path => $callback) {
            if ($path === $url)
                call_user_func($callback);
        }
    }
}