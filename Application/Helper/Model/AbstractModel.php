<?php

namespace Application\Helper\Model;

use Core\Model\Model;
use Application\Container;

abstract class AbstractModel implements Model
{
    protected $application;

    public function __construct(Container $application)
    {
        $this->application = $application;
    }
}