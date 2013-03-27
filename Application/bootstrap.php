<?php

require_once 'Core\bootstrap.php';

$autoloader = new \Core\IO\FileAutoLoader();
$autoloader->register('Application', __DIR__);
spl_autoload_register(array($autoloader, 'load'));

$container = new \Application\Container();
$container->section()->main()->index();