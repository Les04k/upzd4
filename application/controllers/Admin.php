<?php
class Admin extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        
        $this->load->model('user_model');
        $this->load->model('group_model');
        $this->load->model('discipline_model');
        $this->load->model('grade_model');
    }
    
    function index() {
        $data['user'] = $this->user_model->get_user($this->session->userdata('id_u'));
        
        $data['teachers_count'] = count($this->user_model->get_teachers());
        $data['students_count'] = count($this->user_model->get_students());
        $data['groups_count'] = count($this->group_model->get_groups());
        $data['disc_count'] = count($this->discipline_model->get_all());
        
        // Считаем удаленные записи
        $data['deleted_users'] = count($this->user_model->get_deleted_users());
        $data['deleted_groups'] = count($this->group_model->get_deleted_groups());
        $data['deleted_disc'] = count($this->discipline_model->get_deleted());
        $data['deleted_grades'] = count($this->grade_model->get_deleted());
        
        $this->load->view('header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('footer');
    }
    
    function users($show_deleted = false) {
        if ($show_deleted) {
            $data['users'] = $this->user_model->get_all_users(true);
            $data['show_deleted'] = true;
        } else {
            $data['users'] = $this->user_model->get_all_users();
            $data['show_deleted'] = false;
        }
        
        $this->load->view('header');
        $this->load->view('admin/users', $data);
        $this->load->view('footer');
    }
    
    function add_user() {
        if ($this->input->post('save')) {
            $fio = $this->input->post('fio');
            $login = $this->input->post('login');
            $pass = $this->input->post('pass');
            $role = $this->input->post('role');
            
            $this->db->query("INSERT INTO users (fio, login, pass, role) VALUES ('$fio', '$login', md5('$pass'), $role)");
            
            $this->session->set_flashdata('msg', 'Пользователь добавлен');
            redirect('admin/users');
        }
        
        $this->load->view('header');
        $this->load->view('admin/add_user');
        $this->load->view('footer');
    }
    
    // Мягкое удаление
    function delete_user($id_u) {
        $this->user_model->soft_delete($id_u);
        $this->session->set_flashdata('msg', 'Пользователь перемещен в корзину');
        redirect('admin/users');
    }
    
    // Восстановление
    function restore_user($id_u) {
        $this->user_model->restore($id_u);
        $this->session->set_flashdata('msg', 'Пользователь восстановлен');
        redirect('admin/users');
    }
    
    // Показать корзину
    function trash() {
        $data['deleted_users'] = $this->user_model->get_deleted_users();
        $data['deleted_groups'] = $this->group_model->get_deleted_groups();
        $data['deleted_disc'] = $this->discipline_model->get_deleted();
        $data['deleted_grades'] = $this->grade_model->get_deleted();
        
        $this->load->view('header');
        $this->load->view('admin/trash', $data);
        $this->load->view('footer');
    }
}