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
    
    // Мягкое удаление дисциплины
    function soft_delete($id_d) {
        $this->db->query("UPDATE discipline SET is_deleted = 1 WHERE id_d = $id_d");
    }
    
    // Восстановление дисциплины
    function restore($id_d) {
        $this->db->query("UPDATE discipline SET is_deleted = 0 WHERE id_d = $id_d");
    }
    
    // Получить удаленные дисциплины
    function get_deleted() {
        $query = $this->db->query("SELECT * FROM discipline WHERE is_deleted = 1");
        return $query->result();
    }
}