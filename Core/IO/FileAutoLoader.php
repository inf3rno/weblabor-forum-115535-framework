<?php

namespace Core\IO;

class FileAutoLoader implements AutoLoader
{
    protected $namespaceSeparator = '\\';
    protected $extension = '.php';
    protected $settings = array();
    protected $namespace;
    protected $directory;
    protected $class;

    public function register($namespace, $directory)
    {
        if ($namespace == '')
            $this->settings[''] = $directory . DIRECTORY_SEPARATOR;
        else
            $this->settings[$namespace . $this->namespaceSeparator] = $directory . DIRECTORY_SEPARATOR;
    }

    public function load($class)
    {
        foreach ($this->settings as $namespace => $directory) {
            if (substr($class, 0, strlen($namespace)) === $namespace) {
                $path = substr($class, strlen($namespace));
                $file = $directory . $path . $this->extension;
                if (file_exists($file))
                    require_once($file);
            }
        }
    }
}