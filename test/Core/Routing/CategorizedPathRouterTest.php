<?php

class CategorizedPathRouterTest extends PHPUnit_Framework_TestCase
{

    public function testShouldRouteByConfigFile()
    {
        $mockController = $this->getMock('Core\Controller\Controller', array('route1', 'route2'));
        $mockController->expects($this->once())->method('route1');
        $mockController->expects($this->never())->method('route2');

        $mockController2 = $this->getMock('Core\Controller\Controller', array('route2', 'route1'));
        $mockController2->expects($this->once())->method('route2');
        $mockController2->expects($this->never())->method('route1');

        $mockContainer = $this->getMock('Core\Container', array('controller', 'controller2'));
        $mockContainer->expects($this->once())->method('controller')->will($this->returnValue($mockController));
        $mockContainer->expects($this->once())->method('controller2')->will($this->returnValue($mockController2));

        $router = new Core\Routing\CategorizedPathRouter();
        $router->setConfigFile(TEST_WORKSPACE . 'route.json');
        $router->setContainer($mockContainer);
        $router->init();
        $router->dispatch('path1');
        $router->dispatch('path2');
    }

}