<?php

class index_model extends model{

    function __construct() {
        parent::__construct();
    }
    
    public function slider() {
        return $this->db->select('SELECT * FROM page WHERE slider = :slider AND status = :status', array('slider' => 'slider', 'status' => 'activ'));
    }
    
    public function latest() {
        return $this->db->select("SELECT * FROM page WHERE slider = :slider AND status = :status ORDER BY id DESC LIMIT 6", array('slider' => 'normal', 'status' => 'activ'));
    }
    
    public function latestBySec() {
        $sectionIDS = $this->db->select("SELECT sectionID FROM page WHERE status = :status AND slider = :slider", array('slider' => 'normal', 'status' => 'activ'));
        foreach ($sectionIDS as $value) {
            $secIDS[] = $value['sectionID'];
        }
        $secIDS = array_unique($secIDS);
        
        foreach ($secIDS as $value) {
            $pagesBySec[] = $this->db->select("SELECT page.*,section.name AS sectionName FROM page INNER JOIN section ON page.sectionID = section.id WHERE page.sectionID = :sectionID AND page.slider = :slider AND page.status = :status ORDER BY page.id DESC LIMIT 3", array('sectionID' => $value, 'slider' => 'normal', 'status' => 'activ'));
        }
        return $pagesBySec;
    }

}

