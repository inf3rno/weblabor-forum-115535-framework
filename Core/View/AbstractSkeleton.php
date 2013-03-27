<?php

namespace Core\View;

abstract class AbstractSkeleton implements Skeleton
{
    protected $params;

    public function __construct(array $params = null)
    {
        if (isset($params))
            $this->bindAll($params);
    }

    public function bind($param, $value)
    {
        $this->params[$param] = $value;
    }

    public function bindAll(array $params)
    {
        foreach ($params as $param => $value)
            $this->bind($param, $value);
    }

    public function bindTree(array $params)
    {
        foreach ($params as $param => $value) {
            if (is_array($value) && isset($this->params[$param]) && $this->params[$param] instanceof Skeleton)
                $this->params[$param]->bindTree($value);
            else
                $this->bind($param, $value);
        }
    }

}