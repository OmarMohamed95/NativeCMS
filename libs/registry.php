<?php

class registry {

    static private $obj = array();

    private function __construct() {
        
    }
    
    static public function set($name, $value) {
        self::$obj[$name] = $value;
    }

    static public function get($name) {
        if(self::contains($name)){
        return self::$obj[$name];
        }  else {
            throw new Exception('The object '.$name.' not found');
        }
    }

    static public function contains($name) {
        if (isset(self::$obj[$name])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    static public function remove($name) {
        unset(self::$obj[$name]);
    }

}
