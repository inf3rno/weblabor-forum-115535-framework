<?php

namespace Application\Section\Auth;


use Application\Helper\Model\AbstractModel;

class Model extends AbstractModel
{

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