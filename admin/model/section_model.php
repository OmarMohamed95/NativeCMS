<?php

class section_model extends model{

    function __construct() {
        parent::__construct();
    }
    
    public function store($data) {
        $this->db->insert('section' , $data);
    }
    
    public function delete($id) {
        $this->db->delete('section' , 'id', $id);
    }
    
    public function getSingle($id) {
        return $this->db->select('SELECT * FROM section WHERE id = :id' , array('id' => $id), FALSE);
    }
    
    public function getAll() {
        return $this->db->select('SELECT * FROM section');
    }
    
    public function update($id,$data) {
        return $this->db->update('section',$data,"id = $id");
    }

}

