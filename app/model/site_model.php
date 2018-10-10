<?php

class site_model extends model {

    function __construct() {
        parent::__construct();
    }

    function ajaxInsert() {
        $text = $_POST['siteInput'];
        $this->db->insert('data',array(
            'text' => $text
        ));
        $data = array('text' => $text, 'dataid' => $this->db->lastInsertId());
        echo json_encode($data);
    }

    function ajaxGet() {
        $data = $this->db->select("select * from data");
        echo json_encode($data);
    }

    function ajaxDel() {
        $id = $_POST['dataid'];
        $this->db->delete('data', "dataid = {$id}");
    }

}
