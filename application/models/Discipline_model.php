<?php
class Discipline_model extends CI_Model {
    
    function get_all() {
        $query = $this->db->query("SELECT * FROM discipline WHERE is_deleted = 0");
        return $query->result();
    }
    
    function get_by_teacher($id_uch) {
        $query = $this->db->query("SELECT * FROM discipline WHERE id_uch = $id_uch AND is_deleted = 0");
        return $query->result();
    }
    
    function get_discipline($id_d) {
        $query = $this->db->query("SELECT * FROM discipline WHERE id_d = $id_d AND is_deleted = 0");
        return $query->row();
    }
}