<?php
class Group_model extends CI_Model {
    
    function get_groups() {
        $query = $this->db->query("SELECT DISTINCT(title) FROM groups WHERE is_deleted = 0");
        return $query->result();
    }
    
    function get_students_by_group($title) {
        $query = $this->db->query("SELECT users.* FROM groups, users WHERE groups.id_stud = users.id_u AND groups.title = '$title' AND groups.is_deleted = 0");
        return $query->result();
    }
    
    function get_teacher_group($id_uch) {
        $query = $this->db->query("SELECT DISTINCT(title) FROM groups WHERE id_uch = $id_uch AND is_deleted = 0");
        return $query->result();
    }
    
    function get_group_info($title) {
        $query = $this->db->query("SELECT * FROM groups WHERE title = '$title' AND is_deleted = 0 LIMIT 1");
        return $query->row();
    }
}