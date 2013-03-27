<?php

namespace Application\Helper\View;

use Core\View\AbstractSkeleton;

class Redirect extends AbstractSkeleton
{
    public function render()
    {
        if (!isset($this->params['url']))
            throw new \InvalidArgumentException();
        header('location: ' . $this->params['url']);
    }

}