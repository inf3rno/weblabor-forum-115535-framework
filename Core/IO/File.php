<?php

namespace Core\IO;

interface File
{
    public function read($file);

    public function write($file, $content);
}