<?php

class sittings_model extends model {

    function __construct() {
        parent::__construct();
    }
    
    public function store($data) {
        $this->db->insert('sittings', $data);
    }
    
    public function getLast() {
        return $this->db->select('Select * FROM sittings order by id desc limit 1', NULL, FALSE);
    }
    
    

}

