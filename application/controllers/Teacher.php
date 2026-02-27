<?php
class Teacher extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged') || $this->session->userdata('role') != 'teacher') {
            redirect('auth');
        }
        
        $this->load->model('user_model');
        $this->load->model('group_model');
        $this->load->model('discipline_model');
        $this->load->model('grade_model');
    }
    
    function index() {
        $data['user'] = $this->user_model->get_user($this->session->userdata('id_u'));
        $this->load->view('header');
        $this->load->view('teacher/dashboard', $data);
        $this->load->view('footer');
    }
    
    function disciplines() {
        $id_uch = $this->session->userdata('id_u');
        $data['disc'] = $this->discipline_model->get_by_teacher($id_uch);
        $this->load->view('header');
        $this->load->view('teacher/disciplines', $data);
        $this->load->view('footer');
    }
    
    function set_grade() {
        $id_uch = $this->session->userdata('id_u');
        $data['groups'] = $this->group_model->get_teacher_group($id_uch);
        $data['disc'] = $this->discipline_model->get_by_teacher($id_uch);
        $data['students'] = $this->user_model->get_students();
        
        if ($this->input->get('student') && $this->input->get('disc')) {
            $student = $this->input->get('student');
            $disc = $this->input->get('disc');
            $data['exist'] = $this->grade_model->check_exists($student, $disc);
        }
        
        if ($this->input->post('save')) {
            $student = $this->input->post('student');
            $disc = $this->input->post('disc');
            $ocenka = $this->input->post('ocenka');
            
            $exist = $this->grade_model->check_exists($student, $disc);
            
            if ($ocenka == '') {
                if ($exist) {
                    $this->grade_model->delete($exist->id_oc);
                    $this->session->set_flashdata('msg', 'Оценка удалена');
                }
            } else {
                $data = array(
                    'id_stud' => $student,
                    'ocenka' => $ocenka,
                    'discipline' => $disc,
                    'date' => date('Y-m-d'),
                    'comment' => $this->input->post('comment')
                );
                
                if ($exist) {
                    $data['id_oc'] = $exist->id_oc;
                }
                
                $this->grade_model->save($data);
                $this->session->set_flashdata('msg', 'Оценка сохранена');
            }
            
            redirect('teacher/set_grade');
        }
        
        $this->load->view('header');
        $this->load->view('teacher/set_grade', $data);
        $this->load->view('footer');
    }
    
    function student_grades() {
        $data['students'] = $this->user_model->get_students();
        
        if ($this->input->get('student')) {
            $student = $this->input->get('student');
            $data['grades'] = $this->grade_model->get_by_student($student);
            
            $q = $this->db->query("SELECT * FROM users WHERE id_u = $student");
            $data['sinfo'] = $q->row();
        }
        
        $this->load->view('header');
        $this->load->view('teacher/student_grades', $data);
        $this->load->view('footer');
    }
    
    function group_grades() {
        $id_uch = $this->session->userdata('id_u');
        $data['groups'] = $this->group_model->get_teacher_group($id_uch);
        $data['disc'] = $this->discipline_model->get_by_teacher($id_uch);
        
        if ($this->input->get('group') && $this->input->get('disc')) {
            $group = $this->input->get('group');
            $disc = $this->input->get('disc');
            $data['grades'] = $this->grade_model->get_by_group($group, $disc);
        }
        
        $this->load->view('header');
        $this->load->view('teacher/group_grades', $data);
        $this->load->view('footer');
    }
    
    // Добавляем функцию для графиков (задание 5)
    function charts() {
        $id_uch = $this->session->userdata('id_u');
        $data['groups'] = $this->group_model->get_teacher_group($id_uch);
        $data['students'] = $this->user_model->get_students();
        
        if ($this->input->get('group')) {
            $group = $this->input->get('group');
            $data['group_avg'] = $this->grade_model->get_group_avg($group);
            $data['selected_group'] = $group;
        }
        
        if ($this->input->get('student')) {
            $student = $this->input->get('student');
            $data['student_avg'] = $this->grade_model->get_student_avg($student);
            
            $q = $this->db->query("SELECT * FROM users WHERE id_u = $student");
            $sinfo = $q->row();
            $data['selected_student'] = $sinfo->fio;
        }
        
        $this->load->view('header');
        $this->load->view('teacher/charts', $data);
        $this->load->view('footer');
    }
}