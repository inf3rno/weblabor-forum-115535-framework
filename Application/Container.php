<?php

namespace Application;


use Application\Main\Controller;

class Container implements \Core\Container
{
    protected $main;

    public function main()
    {
        if (!isset($this->main))
            $this->main = new Controller();
        return $this->main;
    }
}