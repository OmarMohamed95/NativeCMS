<?php

class profile_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function getSingle($id) {
        return $this->db->select('SELECT userid,username,email,img FROM users WHERE userid = :userid', array('userid' => $id), FALSE);
    }

    public function update($id, $data) {
        $this->db->update('users', $data, "userid = $id");
        session::init();
        session::set('username', $data['username']);
        session::set('img', $data['img']);
    }

}
