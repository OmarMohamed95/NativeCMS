<?php

class page extends controller {

    function __construct() {
        parent::__construct();
    }

    public function index($id) {
        $this->view->getSingle = $this->model->getSingle($id);
        $this->view->render('page/index');
    }

    public function comment($pageID) {
        session::init();

        $form = new form();
        $form->post('content')
                ->validate('_empty');
        $noError = $form->submit();
        $checkLogin = session::get('loggedIn');
        if ($noError === TRUE) {
            if (!empty($checkLogin) and $checkLogin === TRUE) {
                $data['content'] = nl2br(filter_var($_POST['content'], FILTER_SANITIZE_STRING));
                $data['pageID'] = $pageID;
                $data['userID'] = session::get('userid');
                $this->model->comment($data);
            } else {
                $msg['checkLogin'] = 'Please login first to be able to post a comment!';
                echo json_encode($msg);
            }
        } else {
            $msg['empty'] = 'Sorry, you can not post empty comment';
            echo json_encode($msg);
        }
    }

    public function getAllComment($pageID) {
        session::init();
        $data['pageID'] = $pageID;
        $this->model->getAllComment($data);
    }

}
