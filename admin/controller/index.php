<?php

class index extends controller{

    function __construct() {
        auth::checkLoginAdmin();
        parent::__construct();
    }
    
    public function index(){
        $this->view->render('index/index','admin');
    }
    
    public function logout(){
        session::init();
        session::unsit();
        header('location:' . ADMIN_URL . 'login');
        exit();
    }

}
