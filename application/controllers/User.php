<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-circle-o');
            $tab2 = array('name' => 'New user', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-circle-o');
            $data['tabs'] = array($tab1, $tab2);
            $data['users'] = $this->User_model->get_all_users();
            $this->load->view('template/header', $data);
            $this->load->view('User/listuser');
            $this->load->view('template/footer');
        } else {
            redirect('/Main/login', 'refresh');
        }

    }

    public function Addnewuser()
    {
        if (isset($_SESSION['user'])) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', 'id', 'required');
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('password_hash', 'password_hash', 'required');
            $this->form_validation->set_rules('password_salt', 'password_salt', 'required');

            if ($this->form_validation->run() == FALSE) {
                redirect('/Customer/newCus', 'refresh');
            } else {
                $data['page'] = array('header' => 'User New', 'description' => 'create a new user', 'app_name' => 'USER');
                $data['user'] = $_SESSION['user'];
                $data['apps'] = $_SESSION['apps'];
                $data['sucess'] = 'flase';
                $this->load->view('template/header', $data);
                $this->load->view('Customer/new', $data);
                $this->load->view('template/footer');

            }


        }

    }

    public function listuser()
    {
        if (isset($_SESSION['user'])) {
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];

        }
    }
}
