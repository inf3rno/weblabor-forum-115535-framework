<?php

require_once 'Core\bootstrap.php';

header('content-type: text/html; charset=utf-8');
$skeleton = new \Core\View\MultiRenderer(array('te', 'szt'));
echo $skeleton->render();
