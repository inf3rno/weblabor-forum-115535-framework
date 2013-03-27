<?php

class JsonFileTest extends PHPUnit_Framework_TestCase
{
    protected $file;

    protected function setUp()
    {
        $this->file = new Core\IO\JsonFile();
    }

    public function testShouldReadJsonFile()
    {
        $data = $this->file->read(TEST_WORKSPACE . 'my.json');
        $this->assertEquals(array(
            'one' => 1,
            'array' => array(1, 2, 3)
        ), $data);
    }

    /**
     * @expectedException Core\IO\IOException
     */
    public function testShouldFailIfFileNotExist()
    {
        $this->file->read(TEST_WORKSPACE . 'my2.json');
    }

    /**
     * @expectedException Core\IO\ParserException
     */
    public function testShouldFailIfCannotParseData()
    {
        $this->file->read(TEST_WORKSPACE . 'not.json');
    }

    public function testShouldWriteJsonFile()
    {
        $data = array(
            'a' => 1,
            'b' => array(
                'c' => 2
            )
        );
        $path = TEST_WORKSPACE . 'write.json';
        $this->file->write($path, $data);
        $this->assertEquals($data, $this->file->read($path));
    }

}