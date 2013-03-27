<?php

namespace Application\Main;


class Controller implements \Core\Controller\Controller
{
    public function index()
    {
        header('content-type: text/html; charset=utf-8');
        $skeleton = new \Core\View\MultiRenderer(array('te', 'szt'));
        echo $skeleton->render();

    }
}