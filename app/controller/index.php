<?php

class index extends controller{

    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->view->slider = $this->model->slider();
        $this->view->pagesBySec = $this->model->latestBySec();
        $this->view->render('index/index');
    }
    
    public function logout(){
        session::init();
        session::unsit();
        header('location:' . BASE_URL . 'index');
        exit();
    }
}
