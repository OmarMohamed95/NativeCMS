<?php

class signup extends controller {

    public $path;

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->title = 'signup';
        $this->view->render('signup/index');
    }

    function create() {
        $this->path = 'public/images/users/';
        $dir = BASE_DIR . $this->path;
        $maxSize = 2048000;
        if (!empty($_FILES['img']['name'])) {
            $upload = new file($_FILES['img'], $maxSize, $dir);
            $upload->uploadSingle();
            $fullName = $upload->getFileName();
        } else {
            $this->path = 'public/images/';
            $fullName = 'defaultImage/profile.png';
        }
        $form = new form();
        $form->post('username')
                ->validate('minLength', 2)
                ->validate('maxLength', 15)
                ->validate('string')
                ->validate('_empty')
                ->post('password')
                ->validate('minLength', 6)
                ->validate('_empty')
                ->post('email', FILTER_SANITIZE_EMAIL)
                ->validate('_empty')
                ->validate('email');

        $error = $form->submit();
        $msg['msg'] = 'signed in successfuly';
        if ($error === TRUE) {
            $data = $form->get();
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $data['img'] = $this->path . $fullName;

            $this->model->create($data);
            echo json_encode($msg);
        }  else {
            echo json_encode($error);
        }
    }

}
