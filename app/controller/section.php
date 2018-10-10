<?php

class section extends controller{

    function __construct() {
        parent::__construct();
    }

    public function index($id){
        $this->view->getSingle = $this->model->getSingle($id);
        $this->view->render('section/index');
    }
}
