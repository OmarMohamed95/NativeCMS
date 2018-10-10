<?php

class user_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function userList() {

        return $this->db->select("SELECT userid, username, role FROM admin_user");
    }

    public function userSingleList($id) {

        return $this->db->select("SELECT userid, username, role FROM admin_user WHERE userid = :userid", array(':userid' => $id), FALSE);
    }

    public function create($data) {

        $this->db->insert('admin_user', array(
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => $data['role']
        ));
    }

    public function editSave($data) {

        $this->db->update('admin_user', array(
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => $data['role']
                ), "userid = {$data['userid']}");
    }

    public function delete($id) {

        $role = $this->db->select("SELECT role FROM admin_user WHERE userid = :userid", array(':userid' => $id), FALSE);
        if ($role['role'] == 'owner') {
            return FALSE;
        }
        
        $this->db->delete('admin_user', 'userid', $id);
    }

}
