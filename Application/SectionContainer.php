<?php

namespace Application;


use Application\Section\Auth\Controller;

class SectionContainer implements \Core\Container
{
    protected $application;

    protected $auth;

    public function __construct(Container $application)
    {
        $this->application = $application;
    }

    public function auth()
    {
        if (!isset($this->auth))
            $this->auth = new Controller($this->application);
        return $this->auth;
    }

}