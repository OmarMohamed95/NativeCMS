<?php

class section_model extends model{

    function __construct() {
        parent::__construct();
    }
    
    public function getSingle($id) {
        return $this->db->select("SELECT page.*,section.name AS n FROM page INNER JOIN section ON page.sectionID = section.id WHERE page.sectionID = :sectionID AND page.status = :status", array('sectionID' => $id, 'status' => 'activ'));
    }

}

