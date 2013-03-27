<?php

class AbstractSkeletonTest extends PHPUnit_Framework_TestCase
{
    protected $mapParams = array('simple' => 'value', 'second' => 'param', 'third' => 'param');

    public function testShouldBindAllByMap()
    {
        $map = $this->createMap();
        $this->expectsMap($map, $this->mapParams);
        $map->bindAll($this->mapParams);
    }

    public function testShouldByAllByMapOnConstruct()
    {
        $map = $this->createMap();
        $this->expectsMap($map, $this->mapParams);
        $map->__construct($this->mapParams);
    }

    public function testShouldBindAllByZeroLevelTree()
    {
        $map = $this->createMap();
        $this->expectsMap($map, $this->mapParams);
        $map->bindTree($this->mapParams);
    }


    public function testShouldBindLeafByOneLevelTree()
    {
        $this->assertTree(1, array(
            'leaf' => $this->mapParams
        ));
    }

    public function testShouldBindLeafByTwoLevelTree()
    {
        $this->assertTree(2, array(
            'sub_0' => array(
                'leaf' => $this->mapParams
            )
        ));
    }

    public function testShouldBindLeafByThreeLevelTree()
    {
        $this->assertTree(3, array(
            'sub_0' => array(
                'sub_1' => array(
                    'leaf' => $this->mapParams
                )
            )
        ));
    }

    public function testShouldBindLeafByFourLevelTree()
    {
        $this->assertTree(4, array(
            'sub_0' => array(
                'sub_1' => array(
                    'sub_2' => array(
                        'leaf' => $this->mapParams
                    )
                )
            )
        ));
    }

    protected function assertTree($depth, $paramTree)
    {
        $root = $this->createTree($depth);
        $root->bindTree($paramTree);
    }

    protected function createTree($depth)
    {
        $branches = $depth - 1;
        $root = $this->createBranch();
        $node = $root;
        for ($level = 0; $level < $branches; ++$level) {
            $next = $this->createBranch();
            $node->bind('sub_' . $level, $next);
            $node = $next;
        }
        $leaf = $this->createLeaf();
        $leaf->expects($this->once())->method('bindTree')->with($this->equalTo($this->mapParams));
        $node->bind('leaf', $leaf);
        return $root;
    }

    protected function expectsMap($map, array $params)
    {
        $index = 0;
        foreach ($params as $key => $value) {
            $map->expects($this->at($index))->method('bind')->with($this->equalTo($key), $this->equalTo($value));
            ++$index;
        }
    }

    /** @return Core\View\Skeleton */
    protected function createMap()
    {
        return $this->getMockBuilder('Core\View\AbstractSkeleton')
            ->setMethods(array('bind'))
            ->getMockForAbstractClass();
    }

    /** @return Core\View\Skeleton */
    protected function createBranch()
    {
        return $this->getMockForAbstractClass('Core\View\AbstractSkeleton');
    }

    /** @return Core\View\Skeleton */
    protected function createLeaf()
    {
        return $this->getMock('Core\View\Skeleton');
    }

}