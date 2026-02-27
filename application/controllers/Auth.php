<?php
class Auth extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    function index() {
        $this->load->view('header');
        $this->load->view('auth/login');
        $this->load->view('footer');
    }
    
    function do_login() {
        $login = $this->input->post('login');
        $pass = $this->input->post('pass');
        
        $user = $this->user_model->login($login, $pass);
        
        if ($user) {
            // Получаем название роли
            $this->db->where('id_r', $user->role);
            $role_query = $this->db->get('role');
            $role_data = $role_query->row();
            
            // Приводим к нижнему регистру для маршрутов
            $role = '';
            if ($user->role == 1) $role = 'admin';
            if ($user->role == 2) $role = 'teacher';
            if ($user->role == 3) $role = 'student';
            
            $this->session->set_userdata(array(
                'id_u' => $user->id_u,
                'fio' => $user->fio,
                'login' => $user->login,
                'role' => $role,
                'role_name' => $role_data->title,
                'logged' => TRUE
            ));
            
            redirect($role);
        } else {
            $this->session->set_flashdata('error', 'Неверный логин или пароль');
            redirect('auth');
        }
    }
    
    function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}