<?php

class search extends controller{

    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->view->searchQ = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
        $this->view->r = $this->model->searchQ(filter_var($_POST['search'], FILTER_SANITIZE_STRING));
        $this->view->render('search/index');
    }
}
