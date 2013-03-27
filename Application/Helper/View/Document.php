<?php

namespace Application\Helper\View;

use Core\Html\Html4Builder;
use Core\View\AbstractSkeleton;
use Core\View\Skeleton;

class Document extends AbstractSkeleton
{
    public function render()
    {
        $el = new Html4Builder();
        $html = $el->html(
            $el->head(
                $el->title('Példa - ' . $this->params['title'])
            ),
            $el->body(
                $el->h1($this->params['title']),
                ($this->params['content'] instanceof Skeleton) ? $this->params['content']->render() : $this->params['content']
            )
        );
        header('content-type: ' . $el->contentType() . '; charset=utf-8');
        echo $html;
    }

}