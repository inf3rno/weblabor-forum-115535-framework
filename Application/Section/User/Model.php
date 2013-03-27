<?php

namespace Application\Section\User;


use Application\Container;

class Model implements \Core\Model\Model
{
    protected $application;

    public function __construct(Container $application)
    {
        $this->application = $application;
    }

    public function update($password)
    {
        $this->application->store($password);
    }
}