<?php

namespace Core\IO;

class JsonFile implements File
{
    public function read($file)
    {
        $encoded = @file_get_contents($file);
        if ($encoded === false)
            throw new IOException();
        $data = @json_decode($encoded, true);
        if ($data === null)
            throw new ParserException();
        return $data;
    }

    public function write($file, $content)
    {
        if (!isset($content))
            throw new \InvalidArgumentException();
        $encoded = @json_encode($content);
        if ($encoded === false)
            throw new ParserException();
        $result = @file_put_contents($file, $encoded);
        if ($result === false)
            throw new IOException();
    }


}