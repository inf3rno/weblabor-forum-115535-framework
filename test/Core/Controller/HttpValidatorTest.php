<?php

class HttpValidatorTest extends PHPUnit_Framework_TestCase
{
    protected $validator;

    public function testShouldAcceptValidMethod()
    {
        $this->mockGet();
        $this->validator->method('get');
    }

    /**
     * @expectedException Core\Controller\MethodException
     */

    public function testShouldRejectInvalidMethod()
    {
        $this->mockGet();
        $this->validator->method('post');
    }

    public function testShouldReadValidInput()
    {
        $this->mockPost(array('password' => 'teszt'));
        $password = $this->validator->input('password');
        $this->assertEquals($password, 'teszt');
    }

    /**
     * @expectedException Core\Controller\InputException
     */

    public function testShouldRejectNonExistingInput()
    {
        $this->mockPost(array());
        $this->validator->input('password');
    }

    public function testShouldAcceptValidTypeInput()
    {
        $this->mockPost(array('password' => 'teszt'));
        $password = $this->validator->input('password');
        $this->assertEquals($password, 'teszt');
    }

    /**
     * @expectedException Core\Controller\InputException
     */

    public function testShouldRejectInvalidTypeInput()
    {
        $this->mockPost(array('password' => array()));
        $this->validator->input('password', 'string');
    }

    /**
     * @expectedException InvalidArgumentException
     */

    public function testShouldRejectInvalidTypeArgument()
    {
        $this->mockPost(array('password' => 'teszt'));
        $this->validator->input('password', 'invalidTypeArgument');
    }

    protected function setUp()
    {
        $this->validator = new Core\Controller\BasicValidator();
    }

    protected function mockGet(array $data = array())
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET = $data;
        $_REQUEST = $data;
    }

    protected function mockPost(array $data = array())
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = $data;
        $_REQUEST = $data;
    }


}