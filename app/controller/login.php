<?php

class login extends controller{

    function __construct() {
        parent::__construct();
    }

    function index(){
        $this->view->title = 'login';
        $this->view->render('login/index');
    }
    
    function submit(){
        $data['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $data['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $this->model->submit($data);
    }
}