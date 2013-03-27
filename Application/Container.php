<?php

namespace Application;


use Application\Section\Main\Controller;

class Container implements \Core\Container
{
    protected $section;

    public function section()
    {
        if (!isset($this->section))
            $this->section = new SectionContainer($this);
        return $this->section;
    }
}