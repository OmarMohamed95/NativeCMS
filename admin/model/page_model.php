<?php

class page_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function store($data) {
        $this->db->insert('page', $data);
    }

    public function getSingle($id) {
        return $this->db->select('SELECT * FROM page WHERE id = :id', array('id' => $id), FALSE);
    }
    
    // get the ID of the sections that have children to pass them as a parameter to the next func getParentSections
    public function getParentsSectionsID() {
        return $this->db->select('SELECT parentID FROM section WHERE parentID IS NOT NULL', array('parentID' => NULL));
    }
    
    public function getAllSec($pID) {
        return $this->db->select("SELECT * FROM section WHERE id NOT IN ($pID) ORDER BY id ASC");
    }

    public function getAll() {
        return $this->db->select("SELECT page.*,section.name AS n FROM page INNER JOIN section ON page.sectionID = section.id WHERE slider = :slider ORDER BY id DESC", array('slider' => 'normal'));
    }

    public function update($id, $data) {
        return $this->db->update('page', $data, "id = $id");
    }
    
    public function delete($id) {
        $this->db->delete('page', 'id', $id);
    }

}
