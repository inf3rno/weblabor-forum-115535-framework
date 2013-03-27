<?php

require_once 'Core\bootstrap.php';

$autoloader = new \Core\IO\FileAutoLoader();
$autoloader->register('Application', __DIR__);
spl_autoload_register(array($autoloader, 'load'));

$application = new \Application\Container();
$application->dispatch($_SERVER['REQUEST_URI']);