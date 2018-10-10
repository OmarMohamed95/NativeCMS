<?php

class page extends controller {

    function __construct() {
        auth::checkLoginAdmin();
        parent::__construct();
    }

    public function index() {
        $this->view->getAll = $this->model->getAll();
        $this->view->render('page/index', 'admin');
    }

    public function create() {
        $parentID = $this->model->getParentsSectionsID();
        $pID = '';
        foreach ($parentID as $value) {
            $pID .= $value['parentID'] . ',';
        }
        $pID = rtrim($pID, ',');
        $this->view->list = $this->model->getAllSec($pID);
        $this->view->render('page/create', 'admin');
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
        $data['slider'] = 'normal';

        $this->model->store($data);
        header('location:' . ADMIN_URL . 'page');
        exit;
    }

    public function delete($id = NULL) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $this->model->delete($id);
        header('location:' . ADMIN_URL . 'page');
        exit;
    }

    public function edit($id) {
        $this->view->getSingle = $this->model->getSingle($id);
        $parentID = $this->model->getParentsSectionsID();
        $pID = '';
        foreach ($parentID as $value) {
            $pID .= $value['parentID'] . ',';
        }
        $pID = rtrim($pID, ',');
        $this->view->list = $this->model->getAllSec($pID);
        $this->view->render('page/edit', 'admin');
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
        header('location:' . ADMIN_URL . 'page');
        exit;
    }
    
    public function preview($id) {
        $this->view->getSingle = $this->model->getSingle($id);
        $this->view->render('page/preview', 'admin');
    }

}
