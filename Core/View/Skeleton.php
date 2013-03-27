<?php

namespace Core\View;

interface Skeleton
{

    public function bind($param, $value);

    public function bindAll(array $params);

    public function bindTree(array $paramTree);

    public function render();
}