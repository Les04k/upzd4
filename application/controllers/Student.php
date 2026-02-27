<?php
class Student extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged') || $this->session->userdata('role') != 'student') {
            redirect('auth');
        }
        
        $this->load->model('grade_model');
    }
    
    function index() {
        $id_u = $this->session->userdata('id_u');
        $data['grades'] = $this->grade_model->get_by_student($id_u);
        $data['fio'] = $this->session->userdata('fio');
        
        $this->load->view('header');
        $this->load->view('student/my_grades', $data);
        $this->load->view('footer');
    }
}