<?php

class model {

    function __construct() {
        $this->db = new database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASS);
    }
    
    // get the ID of the sections that have children to pass them as a parameter to the next func getParentSections
    public function getParentsSectionsID() {
        return $this->db->select('SELECT parentID FROM section WHERE parentID IS NOT :parentID', array('parentID' => NULL));
    }
    
    public function getParentSections($pID) {
        return $this->db->select("SELECT * FROM section WHERE id IN ($pID) AND status = :status ORDER BY sort ASC", array('status' => 'activ'));
    }
    
    public function getChildSections() {
        return $this->db->select('SELECT * FROM section WHERE parentID IS NOT :parentID AND status = :status ORDER BY sort ASC', array('parentID' => NULL, 'status' => 'activ'));
    }
    
    // section does not have children and they are not children also
    public function getSections($pID) {
        return $this->db->select("SELECT * FROM section WHERE parentID IS :parentID AND id NOT IN ($pID) AND status = :status ORDER BY sort ASC", array('parentID' => NULL, 'status' => 'activ'));
    }
    
    public function sittings() {
        return $this->db->select("SELECT * FROM sittings ORDER BY id  desc LIMIT 1", FALSE, FALSE);
    }

}
