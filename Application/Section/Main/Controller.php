<?php

namespace Application\Section\Main;


use Application\Helper\View\Document;

class Controller implements \Core\Controller\Controller
{
    public function index()
    {
        $doc = new Document();
        $doc->render();
    }
}