<?php

namespace Core\Controller;

class BasicValidator implements Validator
{
    public function method($expected)
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if ($method !== $expected)
            throw new MethodException();
    }

    public function input($name, $expectations = null)
    {
        if (!isset($_REQUEST[$name]))
            throw new InputException();
        $value = $_REQUEST[$name];
        if (isset($expectations)) {
            if ($expectations !== 'string')
                throw new \InvalidArgumentException();
            if (!is_string($value))
                throw new InputException();
        }
        return $value;
    }

}