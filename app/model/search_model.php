<?php

class search_model extends model {

    public function __construct() {
        parent::__construct();
    }

    function searchQ($q) {
        $terms = explode(' ', $q);

        $query = "SELECT * FROM page WHERE";

        foreach ($terms as $w) {
            $query .= " name LIKE '% $w %' OR content LIKE '% $w %' OR";
        }
        // to remove the last word
        $Query = rtrim($query,' OR');
        
        return $this->db->select($Query);
    }

}
