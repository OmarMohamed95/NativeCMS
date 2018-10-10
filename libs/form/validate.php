<?php

class validate {

    function __construct() {
        
    }

    function minLength($data, $arg) {
        if (strlen($data) < $arg) {
            return "it should be greater than $arg letters";
        }
    }

    function maxLength($data, $arg) {
        if (strlen($data) > $arg) {
            return "it should be less than $arg letters";
        }
    }

    function integer($data) {
        if (ctype_digit($data) == FALSE) {
            return "it should be numbers";
        }
    }
    
    function string($data) {
        if (ctype_alpha($data) == FALSE) {
            return "it should be alphabet letters";
        }
    }
    
    function _empty($data) {
        if (empty($data)) {
            return "Required";
        }
    }
    
    function email($data) {
        if (filter_var($data, FILTER_VALIDATE_EMAIL) === FALSE) {
            return "Please enter correct email";
        }
    }

    public function __call($name, $arguments) {
        throw new Exception("$name does not exsist inside " . __CLASS__ . ' class');
    }

}
