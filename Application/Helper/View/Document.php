<?php

namespace Application\Helper\View;

use Core\View\AbstractSkeleton;

class Document extends AbstractSkeleton
{
    public function render()
    {
        header('content-type: text/html; charset=utf-8');
        $skeleton = new \Core\View\MultiRenderer(array('te', 'szt'));
        echo $skeleton->render();
    }

}