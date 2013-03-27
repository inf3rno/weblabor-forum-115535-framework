<?php

namespace Application;


use Application\Helper\Model\Session;
use Core\IO\JsonFile;
use Core\Model\Sha1Encryptor;
use Core\Routing\CategorizedPathRouter;

class Container implements \Core\Container
{
    protected $router;
    protected $routePath = 'route.json';
    protected $section;
    protected $encryptor;
    protected $salt = 'titkos';
    protected $session;
    protected $authKey;
    protected $storePath = 'store.json';
    protected $store;

    public function dispatch($url)
    {
        $this->router()->dispatch($url);
    }

    public function permission($expected = true)
    {
        if ($expected && !$this->session())
            throw new PermissionException();
        if (!$expected && $this->session())
            throw new PermissionException();
    }

    public function session($authorized = null)
    {
        if (!isset($this->session))
            $this->session = new Session();
        if (!isset($authorized))
            return isset($this->session[$this->authKey]) ? $this->session[$this->authKey] : false;
        $this->session[$this->authKey] = $authorized;
    }

    public function store($password = null)
    {
        if (!isset($this->store))
            $this->store = new JsonFile();
        $path = $this->directory() . $this->storePath;
        if (!isset($password))
            return $this->store->read($path);
        $hash = $this->hash($password);
        $this->store->write($path, $hash);
    }

    public function hash($string)
    {
        if (!isset($this->encryptor))
            $this->encryptor = new Sha1Encryptor($this->salt);
        return $this->encryptor->hash($string);
    }

    protected function directory()
    {
        return __DIR__ . DIRECTORY_SEPARATOR;
    }

    protected function router()
    {
        if (!isset($this->router)) {
            $this->router = new CategorizedPathRouter();
            $this->router->setContainer($this->section());
            $this->router->setConfigFile($this->directory() . $this->routePath);
            $this->router->init();
        }
        return $this->router;
    }

    protected function section()
    {
        if (!isset($this->section))
            $this->section = new SectionContainer($this);
        return $this->section;
    }

}