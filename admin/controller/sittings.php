<?php

class sittings extends controller{

    function __construct() {
        auth::checkLoginAdmin();
        parent::__construct();
    }
    
    public function index() {
        $this->view->l = $this->model->getLast();
        $this->view->render('sittings/index', 'admin');
    }
    
    public function store() {
        $data['site_name'] = $_POST['site_name'];
        $data['site_email'] = $_POST['site_email'];
        $data['fb'] = $_POST['fb'];
        $data['tw'] = $_POST['tw'];
        $data['yt'] = $_POST['yt'];
        $this->model->store($data);
        header ('location:'. ADMIN_URL .'sittings');
        exit;
    }

}

