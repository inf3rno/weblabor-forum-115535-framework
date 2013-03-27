<?php
/**
 * Created by JetBrains PhpStorm.
 * User: inf3rno
 * Date: 2013.03.27.
 * Time: 8:30
 * To change this template use File | Settings | File Templates.
 */

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
}