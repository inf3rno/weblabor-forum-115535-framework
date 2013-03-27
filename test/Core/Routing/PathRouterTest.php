<?php

class PathRouterTest extends PHPUnit_Framework_TestCase
{
    protected $simplePath = 'path';
    protected $notRegisteredPath = 'unknown';
    protected $called = false;
    protected $router;

    public function __construct()
    {
        $this->router = new Core\Routing\PathRouter();
        $this->router->route($this->simplePath, array($this, 'observer'));
    }

    public function testShouldDispatchSimplePath()
    {
        $this->assertDispatch($this->simplePath);
    }

    public function testShouldNotDispatchNotRegisteredPath()
    {
        $this->assertNotDispatch($this->notRegisteredPath);
    }

    protected function assertDispatch($url)
    {
        $this->router->dispatch($url);
        $this->assertTrue($this->called);
    }

    protected function assertNotDispatch($url)
    {
        $this->router->dispatch($url);
        $this->assertFalse($this->called);
    }

    public function observer()
    {
        $this->called = true;
    }

    protected function tearDown()
    {
        $this->called = false;
    }
}