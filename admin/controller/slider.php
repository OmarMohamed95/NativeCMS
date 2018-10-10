<?php

class slider extends controller {

    function __construct() {
        auth::checkLoginAdmin();
        parent::__construct();
    }

    public function index() {
        $this->view->getAll = $this->model->getAll();
        $this->view->render('slider/index', 'admin');
    }

    public function create() {
        $this->loadModel('section', 'admin/model/');
        $this->view->list = $this->model->getAll();
        $this->view->render('slider/create', 'admin');
    }

    public function store() {
        session::init();

        $path = 'public/images/pagesImg/';
        $dir = BASE_DIR . $path;
        $maxSize = 2048000;
        if (!empty($_FILES['img']['name'])) {
            $upload = new file($_FILES['img'], $maxSize, $dir);
            $upload->uploadSingle();
            $fullName = $upload->getFileName();
        } else {
            $fullName = 'defaultImage/no-image-available.jpg';
        }

        $data['name'] = $_POST['name'];
        $data['content'] = $_POST['content'];
        $data['sectionID'] = $_POST['sectionID'];
        $data['img'] = $path . $fullName;
        $data['status'] = $_POST['status'];
        $data['creator'] = session::get('admin_name');
        $data['slider'] = 'slider';

        $this->model->store($data);
        header('location:' . ADMIN_URL . 'slider');
        exit;
    }

    public function delete($id) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $this->model->delete($id);
        header('location:' . ADMIN_URL . 'slider');
        exit;
    }

    public function edit($id) {
        $this->view->getSingle = $this->model->getSingle($id);
        $this->loadModel('section', 'admin/model/');
        $this->view->list = $this->model->getAll();
        $this->view->render('slider/edit', 'admin');
    }

    public function update($id) {
        $path = 'public/images/pagesImg/';
        $dir = BASE_DIR . $path;
        $maxSize = 2048000;
        if (!empty($_FILES['img']['name'])) {
            //get updated file to get its full name to remove it and then upload the new one
            $single = $this->model->getSingle($id);
            $file = new file($_FILES['img'], $maxSize, $dir);
            $file->removeFile($single['img']);
            $file->uploadSingle();
            $fullName = $file->getFileName();
            
            $data['img'] = $path . $fullName;
        }  else {
            $single = $this->model->getSingle($id);
            $fullName = $single['img'];
            
            $data['img'] = $fullName;
        }

        $data['name'] = $_POST['name'];
        $data['content'] = $_POST['content'];
        $data['sectionID'] = $_POST['sectionID'];
        $data['status'] = $_POST['status'];


        $this->model->update($id, $data);
        header('location:' . ADMIN_URL . 'slider');
        exit;
    }
    
    public function preview($id) {
        $this->view->getSingle = $this->model->getSingle($id);
        $this->view->render('slider/preview', 'admin');
    }

}
