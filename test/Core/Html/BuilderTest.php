<?php

class BuilderTest extends PHPUnit_Framework_TestCase
{
    protected $el;

    public function setUp()
    {
        $this->el = new \Core\Html\Html4Builder();
    }

    public function testShouldBuildSimpleElement()
    {
        $this->assertEquals('<br>', $this->el->simpleElement('br'));
        $this->assertEquals('<input type="text">', $this->el->simpleElement('input', array('type' => 'text')));
    }

    public function testShouldBuildComplexElement()
    {
        $this->assertEquals('<div></div>', $this->el->complexElement('div'));
        $this->assertEquals('<div style="color:red"></div>', $this->el->complexElement('div', array('style' => 'color:red')));
        $this->assertEquals('<div style="color:red">tartalom</div>', $this->el->complexElement('div', array('style' => 'color:red'), 'tartalom'));
        $this->assertEquals('<div>tartalom</div>', $this->el->complexElement('div', 'tartalom'));
        $this->assertEquals('<div>tartalom</div>', $this->el->complexElement('div', 'tart', 'alom'));
        $this->assertEquals('<div style="color:red">tartalom</div>', $this->el->complexElement('div', array('style' => 'color:red'), 'tart', 'alom'));
    }

    public function testShouldBuildElementsByMethodName()
    {
        $html = $this->el->html(
            $this->el->head(
                $this->el->title('teszt')
            ),
            $this->el->body(
                'tartalom',
                $this->el->br(),
                'még valami'
            )
        );
        $this->assertEquals('<html><head><title>teszt</title></head><body>tartalom<br>még valami</body></html>', $html);
    }


}