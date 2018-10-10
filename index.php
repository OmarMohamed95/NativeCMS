<?php

require 'config/paths.php';
require 'config/database.php';
require 'util/auth.php';

function __autoload($class) {
    require BASE_DIR . LIBS . $class. '.php';
}

$bootstrap = new bootstrap();
$bootstrap->init();