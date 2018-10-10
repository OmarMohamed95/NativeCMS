<?php

class login_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function submit($data) {
        $login = $this->db->select('SELECT * FROM admin_user WHERE username = :username', array(':username' => $data['username']), FALSE);

        if ($login && password_verify($data['password'], $login['password'])) {
            session::init();
            session::set('admin_logged', TRUE);
            session::set('admin_id', $login['id']);
            session::set('admin_name', $login['username']);
            return TRUE;
        }else{
            throw new Exception('username or password is wrong! please try again.');
        }
    }

}
