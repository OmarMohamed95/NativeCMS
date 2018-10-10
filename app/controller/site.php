<?php

class site extends controller {

    function __construct() {
        parent::__construct();
        auth::checkLogin();
    }

    function index() {
        $this->view->title = 'site';
        $this->view->render('site/index');
    }

    function logout() {
        session::destroy();
        header('location:' . BASE_URL . 'login');
        exit;
    }
    
    function ajaxInsert(){
        $this->model->ajaxInsert();
    }
    
    function ajaxGet(){
        $this->model->ajaxGet();
    }
    
    function ajaxDel(){
        $this->model->ajaxDel();
    }

}
