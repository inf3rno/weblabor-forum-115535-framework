<?php

namespace Core\View;

class MultiRenderer extends AbstractSkeleton
{
    public function render()
    {
        $result = '';
        foreach ($this->params as $item) {
            if ($item instanceof Skeleton)
                $result .= $item->render();
            else
                $result .= $item;
        }
        return $result;
    }
}