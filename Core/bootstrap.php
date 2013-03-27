<?php

require_once __DIR__ . '\IO\AutoLoader.php';
require_once __DIR__ . '\IO\FileAutoLoader.php';

$autoloader = new Core\IO\FileAutoLoader();
$autoloader->register('Core', __DIR__);

spl_autoload_register(array($autoloader, 'load'));

