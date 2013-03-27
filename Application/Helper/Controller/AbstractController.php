<?php

namespace Application\Helper\Controller;


use Application\Container;
use Application\Helper\View\Redirect;
use Core\Controller\BasicValidator;
use Core\Controller\Controller;

abstract class AbstractController implements Controller
{

    protected $application;
    protected $validator;

    public function __construct(Container $application)
    {
        $this->application = $application;
        $this->validator = new BasicValidator();
    }

    protected function redirect($url)
    {
        $redirect = new Redirect(array('url' => $url));
        $redirect->render();
    }
}