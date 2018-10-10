<?php

class error extends controller{

    function __construct() {
        parent::__construct();
        $this->view->msg = 'this page doesnt exist';
    }
    
    function index(){
        $this->view->title = 'error';
        $this->view->render('error/index');
    }
}
