<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('Role_model');

    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-circle-o');
            $tab2 = array('name' => 'New user', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-circle-o');
            $tab3 = array('name' => 'Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-circle-o');
            $data['tabs'] = array($tab1, $tab2, $tab3);
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

            $this->User_model->set_user_data();
            $data['page'] = array('header' => 'User New', 'description' => 'create a new user', 'app_name' => 'New User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];

            $this->load->view('template/header', $data);
            $this->load->view('User/new', $data);
            $this->load->view('template/footer');


        }

    }

    public function Addnewrole()
    {
        if (isset($_SESSION['user'])) {

            $this->Role_model->set_role_data();
            $data['page'] = array('header' => 'Role New', 'description' => 'create a new Role', 'app_name' => 'New Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];

            $this->load->view('template/header', $data);
            $this->load->view('User/newrole', $data);
            $this->load->view('template/footer');


        }

    }


public function new()
  {
      if (isset($_SESSION['user'])) {
          $data['page'] = array('header' => 'User New', 'description' => 'create a new user', 'app_name' => 'New User');
          $data['user'] = $_SESSION['user'];
          $data['apps'] = $_SESSION['apps'];
          $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-circle-o');
          $tab2 = array('name' => 'New user', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-circle-o');
          $tab3 = array('name' => 'Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-circle-o');
          $data['tabs'] = array($tab1, $tab2, $tab3);

          $this->load->view('template/header', $data);
          $this->load->view('User/new', $data);
          $this->load->view('template/footer');
      }
      else {
          redirect('/Main/login', 'refresh');
      }
    }

    public function newrole()
      {
          if (isset($_SESSION['user'])) {
              $data['page'] = array('header' => 'Role New', 'description' => 'create a new role', 'app_name' => 'New Role');
              $data['user'] = $_SESSION['user'];
              $data['apps'] = $_SESSION['apps'];
              $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-circle-o');
              $tab2 = array('name' => 'New user', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-circle-o');
              $tab3 = array('name' => 'Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-circle-o');
              $tab4 = array('name' => 'New Role', 'link' => base_url() . '/User/newrole', 'icon' => 'fa fa-circle-o');
              $data['tabs'] = array($tab1, $tab2, $tab3,$tab4);

              $this->load->view('template/header', $data);
              $this->load->view('User/newrole', $data);
              $this->load->view('template/footer');
          }
          else {
              redirect('/Main/login', 'refresh');
          }
        }

    public function role(){
        if(isset($_SESSION['user'])){
            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-circle-o');
            $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-circle-o');
            $tab3 = array('name'=>'Role','link'=>base_url().'/User/role', 'icon'=>'fa fa-circle-o');
            $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-circle-o');
            $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
            $data['roles'] = $this->Role_model->get_all_roles();
            $this->load->view('template/header',$data);
            $this->load->view('User/role',$data);
            $this->load->view('template/footer');

        }

    }
    public function listuser()
    {
        if (isset($_SESSION['user'])) {
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-circle-o');
            $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-circle-o');
            $tab3 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-circle-o');
            $data['tabs'] = array($tab1,$tab2,$tab3);
            $data['users'] = $this->User_model->get_all_users();
            $this->load->view('template/header',$data);
            $this->load->view('User/listuser',$data);
            $this->load->view('template/footer');

        }
    }

    public function editrole($id)
    {
        if(isset($_SESSION['user'])){
            //$id = $this->input->post('id');
            $data['page'] = array('header'=>'Roles', 'description'=>'Edit info','app_name'=>'User Role Edit');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            //$data['tabs'] = $this->maketab($_SESSION['access'],$id);
        //$id = $this->input->post('id');
        $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-circle-o');
        $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-circle-o');
        $tab3 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-circle-o');
        $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-circle-o');
        $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
        $data['roles']=$this->Role_model->editrole($id);
        //$data['projects'] =$this->Customer_model->get_project($id);
        $this->load->view('template/header',$data);
        $this->load->view('User/editrole',$data);
        $this->load->view('template/footer');}
    }

    public function delete(){
        if(isset($_SESSION['user']))
        {
            $id = $_SESSION['id'];
            $this->Role_model->delete($id);
        }
    }

    public function update($id){
        if(isset($_SESSION['user']))
        {
            //$id = $_SESSION['id'];
            $this->Role_model->update($id);
            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['roles']=$this->Role_model->get_role_data();
            //$data['tabs'] = $this->maketab($_SESSION['access'],$id);
            $this->load->view('template/header',$data);
            $this->load->view('User/role',$data);
            $this->load->view('template/footer');

        }
    }

    public function rolebyid()
    {   if(isset($_SESSION['user'])){
            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-circle-o');
            $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-circle-o');
            $tab3 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-circle-o');
            $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-circle-o');
            $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
        $id = $this->input->post('id');
        $this->load->model('Role_model');
        $data['roles']=$this->Role_model->get_data_by_id($id);
        $this->load->view('template/header',$data);
        $this->load->view('User/role',$data);
        $this->load->view('template/footer');
    }
    }

    public function rolebyidview($id)
    {
        if(isset($_SESSION['user'])){
            //$id = $this->input->post('id');

            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-circle-o');
            $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-circle-o');
            $tab3 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-circle-o');
            $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-circle-o');
            $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
            //$data['tabs'] = $this->maketab($_SESSION['access'],$id);
        //$id = $this->input->post('id');
        $data['roles']=$this->Role_model->get_data_by_id($id);
        $data['users'] =$this->Role_model->get_user($id);
        $this->load->view('template/header',$data);
        $this->load->view('User/viewrole',$data);
        $this->load->view('template/footer');}
    }
}
