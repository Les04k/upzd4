<?php
class Admin extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        // Проверяем, что это админ
        if (!$this->session->userdata('logged') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        
        $this->load->model('user_model');
        $this->load->model('group_model');
        $this->load->model('discipline_model');
    }
    
    function index() {
        $data['user'] = $this->user_model->get_user($this->session->userdata('id_u'));
        
        // Считаем количество
        $data['teachers_count'] = count($this->user_model->get_teachers());
        $data['students_count'] = count($this->user_model->get_students());
        $data['groups_count'] = count($this->group_model->get_groups());
        $data['disc_count'] = count($this->discipline_model->get_all());
        
        $this->load->view('header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('footer');
    }
    
    function users() {
        $data['users'] = $this->user_model->get_all_users();
        $this->load->view('header');
        $this->load->view('admin/users', $data);
        $this->load->view('footer');
    }
    
    function add_user() {
        if ($this->input->post('save')) {
            $data = array(
                'fio' => $this->input->post('fio'),
                'login' => $this->input->post('login'),
                'pass' => md5($this->input->post('pass')),
                'role' => $this->input->post('role')
            );
            
            $this->db->insert('users', $data);
            $this->session->set_flashdata('msg', 'Пользователь добавлен');
            redirect('admin/users');
        }
        
        $this->load->view('header');
        $this->load->view('admin/add_user');
        $this->load->view('footer');
    }
    
    function delete_user($id_u) {
        $this->db->set('is_deleted', 1);
        $this->db->where('id_u', $id_u);
        $this->db->update('users');
        redirect('admin/users');
    }
}