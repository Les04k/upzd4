<?php
class Grade_model extends CI_Model {
    
    function get_by_student($id_stud) {
        $query = $this->db->query("SELECT ocenka.*, discipline.title as disc_name FROM ocenka, discipline WHERE ocenka.discipline = discipline.id_d AND ocenka.id_stud = $id_stud AND ocenka.delet = 0 ORDER BY ocenka.date DESC");
        return $query->result();
    }
    
    function save($data) {
        if (isset($data['id_oc'])) {
            $id = $data['id_oc'];
            $id_stud = $data['id_stud'];
            $ocenka = $data['ocenka'];
            $discipline = $data['discipline'];
            $date = $data['date'];
            $comment = $data['comment'];
            
            $this->db->query("UPDATE ocenka SET id_stud = $id_stud, ocenka = $ocenka, discipline = $discipline, date = '$date', comment = '$comment' WHERE id_oc = $id");
        } else {
            $id_stud = $data['id_stud'];
            $ocenka = $data['ocenka'];
            $discipline = $data['discipline'];
            $date = $data['date'];
            $comment = $data['comment'];
            
            $this->db->query("INSERT INTO ocenka (id_stud, ocenka, discipline, date, comment) VALUES ($id_stud, $ocenka, $discipline, '$date', '$comment')");
        }
    }
    
    function delete($id_oc) {
        $this->db->query("UPDATE ocenka SET delet = 1 WHERE id_oc = $id_oc");
    }
    
    function check_exists($id_stud, $discipline) {
        $query = $this->db->query("SELECT * FROM ocenka WHERE id_stud = $id_stud AND discipline = $discipline AND delet = 0");
        return $query->row();
    }
    
    function get_by_group($group_title, $discipline) {
        $query = $this->db->query("SELECT ocenka.*, users.fio FROM ocenka, users, groups WHERE ocenka.id_stud = users.id_u AND users.id_u = groups.id_stud AND groups.title = '$group_title' AND ocenka.discipline = $discipline AND ocenka.delet = 0 AND groups.is_deleted = 0");
        return $query->result();
    }
    
    function get_student_avg($id_stud) {
        $query = $this->db->query("SELECT discipline.title, AVG(ocenka.ocenka) as avg_grade FROM ocenka, discipline WHERE ocenka.discipline = discipline.id_d AND ocenka.id_stud = $id_stud AND ocenka.delet = 0 GROUP BY ocenka.discipline");
        return $query->result();
    }
    
    function get_group_avg($group_title) {
        $query = $this->db->query("SELECT discipline.title, AVG(ocenka.ocenka) as avg_grade FROM ocenka, discipline, users, groups WHERE ocenka.discipline = discipline.id_d AND ocenka.id_stud = users.id_u AND users.id_u = groups.id_stud AND groups.title = '$group_title' AND ocenka.delet = 0 GROUP BY ocenka.discipline");
        return $query->result();
    }
}