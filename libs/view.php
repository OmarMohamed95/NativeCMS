<?php

class view {

    function __construct() {
        
    }

    public function render($name, $dir = 'app', $noDefault = FALSE) {
        if ($noDefault == TRUE) {
            require BASE_DIR . $dir . '/view/' . $name . '.php';
        } else {
            require BASE_DIR . $dir . '/view/header.php';
            require BASE_DIR . $dir . '/view/' . $name . '.php';
            require BASE_DIR . $dir . '/view/footer.php';
        }
    }

}
