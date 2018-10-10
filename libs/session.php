<?php

class session {

    public static function init() {
        @session_start();
        session_regenerate_id();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if(isset($_SESSION[$key]))
        return $_SESSION[$key];
    }
    
    public static function destroy() {
        session_destroy();
    }
    
    public static function unsit() {
        unset($_SESSION['loggedIn']);
    }

}
