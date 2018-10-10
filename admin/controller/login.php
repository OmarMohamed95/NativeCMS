<?php

class login extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('login/index', 'admin', TRUE);
    }

    function submit() {
        $data['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $data['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        try {
            $log = $this->model->submit($data);
            if ($log) {
                header('location:' . ADMIN_URL . 'index');
                exit;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
