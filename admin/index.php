<?php
require '../config/database.php';
require '../config/paths.php';
require '../util/auth.php';

function __autoload($class){
    require BASE_DIR . LIBS . $class . '.php';
}

$adminBootstrap = new bootstrap();
$adminBootstrap->setControllerPath('admin/controller');
$adminBootstrap->setModelPath('admin/model');
$adminBootstrap->setDefaultFile('login');
$adminBootstrap->init();
