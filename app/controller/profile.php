<?php

class profile extends controller {

    function __construct() {
        auth::checkLogin();
        parent::__construct();
    }

    public function index($id) {
        $this->view->getSingle = $this->model->getSingle($id);
        $this->view->render('profile/index');
    }

    public function delete($id) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $this->model->delete($id);
        header('location:' . ADMIN_URL . 'page');
        exit;
    }

    public function update($id) {
        $path = 'public/images/users/';
        $dir = BASE_DIR . $path;
        $maxSize = 2048000;
        $single = $this->model->getSingle($id);
        if (!empty($_FILES['img']['name'])) {
            //get updated file to get its full name to remove it and then upload the new one
            $file = new file($_FILES['img'], $maxSize, $dir);
            $file->removeFile($single['img']);
            $file->uploadSingle();
            $fullName = $file->getFileName();
            
            $data['img'] = $path . $fullName;
        }  else {
            $fullName = $single['img'];
            
            $data['img'] = $fullName;
        }

        $data['username'] = $_POST['username'];
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['email'] = $_POST['email'];

        $this->model->update($id, $data);
        header('location:' . BASE_URL . 'index');
        exit;
    }

}
