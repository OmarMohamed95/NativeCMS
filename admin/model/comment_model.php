<?php

class comment_model extends model{

    function __construct() {
        parent::__construct();
    }
    
    public function getAll() {
        return $this->db->select('SELECT comment.*,users.username FROM comment INNER JOIN users ON comment.userID = users.userid');
    }

    public function getSingle($id) {
        return $this->db->select('SELECT comment.*,users.username FROM comment INNER JOIN users ON comment.userID = users.userid  WHERE id = :id', array('id' => $id), FALSE);
    }
    
    public function delete($id) {
        $this->db->delete('comment' , 'id', $id);
    }

}

