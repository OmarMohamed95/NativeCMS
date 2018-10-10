<?php

require 'form/validate.php';

class form {

    private $_currentItem = null;
    private $_postData = array();
    private $_validate = array();
    private $_error = array();

    function __construct() {
        $this->_validate = new validate();
    }

    //post function store values in $_postData
    function post($field, $filterType = FILTER_SANITIZE_STRING) {
        $this->_postData[$field] = filter_var($_POST[$field], $filterType);
        $this->_currentItem = $field;
        return $this;
    }

    //get function get values from $_postData
    function get($field = FALSE) {
        if ($field) {
            if (isset($field)) {
                return $this->_postData[$field];
            } else {
                return FALSE;
            }
        } else {
            return $this->_postData;
        }
    }

    function validate($typeOfValidator, $arg = NULL) {
        if ($arg == NULL) {
            $error = $this->_validate->{$typeOfValidator}($this->_postData[$this->_currentItem]);
        } else {
            $error = $this->_validate->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
        }

        if ($error) {
            $this->_error[$this->_currentItem] = $error;
        }
        return $this;
    }

    function submit() {
        if (empty($this->_error)) {
            return true;
        } else {
            return $this->_error;
        }
    }

}
