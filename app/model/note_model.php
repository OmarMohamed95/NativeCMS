<?php

class note_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function noteList() {

        return $this->db->select("SELECT * FROM note WHERE userid = :userid",array(':userid' => $_SESSION['userid']));
    }

    public function noteSingleList($id) {

        return $this->db->select("SELECT * FROM note WHERE noteid = :noteid AND userid = :userid", array(':noteid' => $id, ':userid' => $_SESSION['userid']), FALSE);
    }

    public function create($data) {

        $this->db->insert('note', array(
            'title' => $data['title'],
            'userid' => $_SESSION['userid'],
            'content' => $data['content'],
            'date_added' => date('y-m-d h:i:s')
        ));
    }

    public function editSave($data) {

        $this->db->update('note', array(
            'title' => $data['title'],
            'content' => $data['content'],
            'date_added' => date('y-m-d h:i:s')
                ), "noteid = {$data['noteid']} And userid = {$_SESSION['userid']}");
    }

    public function delete($id) {

        $this->db->delete('note', "noteid = {$id} And userid = {$_SESSION['userid']}");
    }

}
