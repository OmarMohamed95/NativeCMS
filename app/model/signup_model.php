<?php

class signup_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function create($data) {

        $this->db->insert("users", $data);
        $id = $this->db->lastInsertId();
        session::init();
        session::set('userid', $id);
        session::set('username', $data['username']);
        session::set('img', $data['img']);
        session::set('loggedIn', TRUE);
    }

}
