<?php

class note extends controller {

    function __construct() {
        parent::__construct();
        auth::checkLogin();
    }

    function index() {
        $this->view->title = 'note';
        $this->view->noteList = $this->model->noteList();
        $this->view->render('note/index');
    }
    
    function create() {
        $data = array();
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];
        
        $this->model->create($data);    
        header('location:'.BASE_URL.'note');
    }
    
    function edit($id) {
        $this->view->note = $this->model->noteSingleList($id);
        $this->view->render('note/edit');
    }
    
    function editSave($id) {
        $data = array();
        $data['noteid'] = $id;
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];
        
        $this->model->editSave($data);    
        header('location:'.BASE_URL.'note');
    }
    
    function delete($id) {
        $this->model->delete($id); 
        header('location:'.BASE_URL.'note');
    }

}
