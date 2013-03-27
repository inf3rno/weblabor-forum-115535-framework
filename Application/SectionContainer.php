<?php

namespace Application;


use Application\Section\Main\Controller;

class SectionContainer implements \Core\Container
{
    protected $application;

    protected $main;

    public function __construct(Container $application)
    {
        $this->application = $application;
    }

    public function application()
    {
        return $this->application;
    }

    public function main()
    {
        if (!isset($this->main))
            $this->main = new Controller();
        return $this->main;
    }
}