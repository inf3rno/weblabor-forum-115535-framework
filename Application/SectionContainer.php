<?php

namespace Application;


use Application\Section\Auth\Controller;

class SectionContainer implements \Core\Container
{
    protected $application;

    protected $auth;
    protected $user;

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

    public function user()
    {
        if (!isset($this->user))
            $this->user = new \Application\Section\User\Controller($this->application);
        return $this->user;
    }

}