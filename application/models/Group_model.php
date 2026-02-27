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
    
    // Мягкое удаление группы (всех записей группы)
    function soft_delete_group($title) {
        $this->db->query("UPDATE groups SET is_deleted = 1 WHERE title = '$title'");
    }
    
    // Восстановление группы
    function restore_group($title) {
        $this->db->query("UPDATE groups SET is_deleted = 0 WHERE title = '$title'");
    }
    
    // Получить удаленные группы
    function get_deleted_groups() {
        $query = $this->db->query("SELECT DISTINCT(title) FROM groups WHERE is_deleted = 1");
        return $query->result();
    }
}