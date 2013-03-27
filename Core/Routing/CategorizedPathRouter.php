<?php

namespace Core\Routing;

use Core\Container;
use Core\IO\JsonFile;

class CategorizedPathRouter extends PathRouter
{
    protected $configFile;
    protected $pathRouter;
    protected $container;

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    public function setConfigFile($configFile)
    {
        $this->configFile = $configFile;
    }

    public function init()
    {
        $container = $this->container;
        foreach ($this->readConfig() as $controller => $routes)
            foreach ($routes as $path => $action) {
                $this->route($path, function () use ($container, $controller, $action) {
                    $container->$controller()->$action();
                });
            }
    }

    protected function readConfig()
    {
        $json = new JsonFile();
        $routes = $json->read($this->configFile);
        return $routes;
    }

}