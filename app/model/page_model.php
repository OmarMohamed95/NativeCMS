<?php

class page_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function getSingle($id) {
        return $this->db->select("SELECT * FROM page WHERE id = :id  AND page.status = :status", array('id' => $id, 'status' => 'activ'), FALSE);
    }

    public function comment($data) {
        $insert = $this->db->insert("comment", $data);
        if ($insert):
            $id = $this->db->lastInsertId();
            $select = $this->db->select("SELECT comment.*,users.username,users.img FROM comment INNER JOIN users ON comment.userID = users.userid WHERE comment.userID = :userID AND comment.pageID = :pageID AND id = :id", array('userID' => $data['userID'], 'pageID' => $data['pageID'], 'id' => $id), FALSE);

            echo json_encode($select);
        endif;
    }

    public function getAllComment($data) {

        $select = $this->db->select("SELECT comment.*,users.username,users.img FROM comment INNER JOIN users ON comment.userID = users.userid WHERE comment.pageID = :pageID ORDER BY comment.id desc", array('pageID' => $data['pageID']));

        echo json_encode($select);
    }

}
