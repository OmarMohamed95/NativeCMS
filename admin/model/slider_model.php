<?php

class slider_model extends model {

    function __construct() {
        parent::__construct();
    }

    public function store($data) {
        $this->db->insert('page', $data);
    }

    public function delete($id) {
        $this->db->delete('page', 'id', $id);
    }

    public function getSingle($id) {
        return $this->db->select('SELECT * FROM page WHERE id = :id', array('id' => $id), FALSE);
    }

    public function getAll() {
        return $this->db->select("SELECT page.*,section.name AS n FROM page INNER JOIN section ON page.sectionID = section.id WHERE slider = :slider", array('slider' => 'slider'));
    }

    public function update($id, $data) {
        return $this->db->update('page', $data, "id = $id");
    }

}
