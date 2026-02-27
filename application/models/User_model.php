<?php
class User_model extends CI_Model {
    
    function login($login, $pass) {
        $query = $this->db->query("SELECT * FROM users WHERE login = '$login' AND pass = md5('$pass') AND is_deleted = 0");
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }
    
    function get_user($id_u) {
        $query = $this->db->query("SELECT * FROM users WHERE id_u = $id_u AND is_deleted = 0");
        return $query->row();
    }
    
    function get_all_users() {
        $query = $this->db->query("SELECT users.*, role.title as role_name FROM users, role WHERE users.role = role.id_r AND users.is_deleted = 0");
        return $query->result();
    }
    
    function get_students() {
        $query = $this->db->query("SELECT * FROM users WHERE role = 3 AND is_deleted = 0");
        return $query->result();
    }
    
    function get_teachers() {
        $query = $this->db->query("SELECT * FROM users WHERE role = 2 AND is_deleted = 0");
        return $query->result();
    }
}