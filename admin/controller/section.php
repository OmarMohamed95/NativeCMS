<?php

class section extends controller {

    function __construct() {
        auth::checkLoginAdmin();
        parent::__construct();
    }

    public function index() {
        $this->view->sections = $this->model->getAll();
        $this->view->render('section/index', 'admin');
    }

    public function create() {
        $this->view->list = $this->model->getAll();
        $this->view->render('section/create', 'admin');
    }

    public function store() {
        session::init();
        $data['name'] = $_POST['name'];
        $data['parentID'] = $_POST['parentID'];
        $data['status'] = $_POST['status'];
        $data['sort'] = $_POST['sort'];
        $data['creator'] = session::get('admin_name');
        if ($data['parentID'] == '') {
            $data['parentID'] = NULL;
        }
        $this->model->store($data);
        header('location:'. ADMIN_URL . 'section');
        exit;
    }

    public function delete($id) {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        $this->model->delete($id);
        header('location:'. ADMIN_URL . 'section');
        exit;
    }
    
    public function edit($id) {
        $this->view->list = $this->model->getAll();
        $this->view->getSingle = $this->model->getSingle($id);
        $this->view->render('section/edit', 'admin');
    }
    
    public function update($id) {
        $data['name'] = $_POST['name'];
        $data['parentID'] = $_POST['parentID'];
        $data['status'] = $_POST['status'];
        $data['sort'] = $_POST['sort'];
        if ($data['parentID'] == '') {
            $data['parentID'] = NULL;
        }
        $this->model->update($id,$data);
        header('location:'. ADMIN_URL . 'section');
        exit;
    }

}
