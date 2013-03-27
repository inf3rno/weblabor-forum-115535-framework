<?php

class FileAutoLoaderTest extends PHPUnit_Framework_TestCase
{
    protected $globalClasses = array('MyClass', 'MySecondClass', 'MyNamespace\MyThirdClass');
    protected $localClasses = array('MyLocalNamespace\MyClass');
    protected $localNamespace = 'MyLocalNamespace';
    protected $localDirectoryPath = 'Local';
    protected $autoloader;

    protected function setUp()
    {
        $this->autoloader = new Core\IO\FileAutoLoader();
    }

    public function testShouldLoadClassFromGlobalNamespace()
    {
        $this->assertLoad('', TEST_WORKSPACE, $this->globalClasses);
    }

    public function testShouldLoadClassFromCustomNamespace()
    {
        $this->assertLoad($this->localNamespace, TEST_WORKSPACE . $this->localDirectoryPath, $this->localClasses);
    }

    protected function assertLoad($namespace, $directory, $classes)
    {
        $this->autoloader->register($namespace, $directory);
        $result = array();
        foreach ($classes as $class) {
            $this->autoloader->load($class);
            if (class_exists($class))
                $result[] = $class;
        }
        $this->assertEquals($classes, $result);
    }

}