<?php

class login_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function submit($data) {

        $r = $this->db->select("SELECT * FROM users WHERE username = :username", array('username' => $data['username']), FALSE);

        if ($r !== FALSE) {
            if (password_verify($data['password'], $r['password'])) {
                session::init();
                session::set('userid', $r['userid']);
                session::set('username', $r['username']);
                session::set('img', $r['img']);
                session::set('loggedIn', TRUE);
                $msg['loggedIn'] = 'loggedIn';
                echo json_encode($msg);
            } else {
                $msg['msgPassword'] = 'Password is wrong';
                echo json_encode($msg);
            }
        } else {
            $msg['msgUsername'] = 'Username is wrong';
            echo json_encode($msg);
        }
    }

}
