<?php

namespace Application\Section\Auth;


use Application\Container;

class Model implements \Core\Model\Model
{
    protected $application;

    public function __construct(Container $application)
    {
        $this->application = $application;
    }

    public function login($password)
    {
        if ($this->application->hash($password) == $this->application->store())
            $this->application->session(true);
        else
            throw new LoginException();
    }

    public function logout()
    {
        $this->application->session(false);
    }
}