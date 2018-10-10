<?php

class user extends controller {

    public function __construct() {
        parent::__construct();
        auth::checkLoginAdmin();
    }

    public function index() {
        $this->view->title = 'admins';
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index', 'admin');
    }
    
    public function create() {
        $this->view->render('user/create', 'admin');
    }
    
    
    public function store() {
        $data = array();
        $data['username'] = $_POST['username'];
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['role'] = $_POST['role'];
        
        $this->model->create($data);    
        header('location:'.ADMIN_URL.'user');
        exit;
    }
    
    public function edit($id) {
        $this->view->user = $this->model->userSingleList($id);
        $this->view->render('user/edit', 'admin');
    }
    
    public function editSave($id) {
        $data = array();
        $data['userid'] = $id;
        $data['username'] = $_POST['username'];
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['role'] = $_POST['role'];
        
        $this->model->editSave($data);    
        header('location:'.ADMIN_URL.'user');
        exit;
    }
    
    public function delete($id = NULL) {
        if (isset($_POST['userid'])) {
            $id = $_POST['userid'];
        }
        $this->model->delete($id);
        header('location:' . ADMIN_URL . 'user');
        exit;
    }

}
