<?php

class MultiRendererTest extends PHPUnit_Framework_TestCase
{
    public function testWithSingleString()
    {
        $this->assertRender('a', array('a'));
    }

    public function testWithMultiString()
    {
        $this->assertRender('abc', array('a', 'b', 'c'));
    }

    public function testWithSubSkeleton()
    {
        $sub = new \Core\View\MultiRenderer();
        $sub->bindAll(array('b', 'c'));
        $this->assertRender('abcd', array('a', $sub, 'd'));
    }

    protected function assertRender($expected, array $items)
    {
        $renderer = new \Core\View\MultiRenderer();
        $renderer->bindAll($items);
        $this->assertEquals($expected, $renderer->render());
    }
}