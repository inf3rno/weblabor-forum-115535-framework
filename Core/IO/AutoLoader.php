<?php

namespace Core\IO;

interface AutoLoader
{
    public function register($namespace, $directory);

    public function load($class);
}