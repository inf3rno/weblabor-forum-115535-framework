<?php

namespace Core\Controller;

interface Validator
{
    public function method($expected);

    public function input($name, $expectations);

}