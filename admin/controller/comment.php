<?php

class comment extends controller {

    function __construct() {
        auth::checkLoginAdmin();
        parent::__construct();
    }

    public function index() {
        $this->view->getAll = $this->model->getAll();
        $this->view->render('comment/index', 'admin');
    }
    
    public function details($id) {
        $this->view->getSingle = $this->model->getSingle($id);
        $this->view->render('comment/details', 'admin');
    }

    public function delete($id) {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        $this->model->delete($id);
        header('location:'. ADMIN_URL . 'comment');
        exit;
    }

}
