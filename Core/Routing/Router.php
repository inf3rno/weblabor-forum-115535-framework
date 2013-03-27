<?php

namespace Core\Routing;

interface Router
{

    public function route($path, $callback);

    public function dispatch($url);
}