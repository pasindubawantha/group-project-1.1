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
            $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-tasks');
            $tab2 = array('name' => 'New User', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-user-plus');
            $tab3 = array('name' =>  'User Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-circle-o');
            $data['tabs'] = array($tab1, $tab2,$tab3);
            $data['users'] = $this->User_model->get_all_users();
            $data['data_tables'] = array('user_table');
            $this->load->view('template/header', $data);
            $this->load->view('User/listuser', $data);
            $this->load->view('template/footer',$data);
        } else {
            redirect('/Main/login', 'refresh');
        }

    }

    public function new()
    {
        if (isset($_SESSION['user'])) {
            $data['page'] = array('header' => 'User New', 'description' => 'create a new user', 'app_name' => 'New User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-tasks');
            $tab2 = array('name' => 'New user', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-user-plus');
            $tab3 = array('name' => 'Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-circle-o');
            $data['tabs'] = array($tab1, $tab2, $tab3);
            $data['roles'] = $this->User_model->getrole();
            $this->load->view('template/header', $data);
            $this->load->view('User/new', $data);
            $this->load->view('template/footer');
        }
        else {
            redirect('/Main/login', 'refresh');
        }
    }

    public function Addnewuser()
    {
        if (isset($_SESSION['user'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', 'id', 'required');
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('role_id', 'role_id', 'required');
            $this->form_validation->set_rules('password_hash', 'password_hash', 'required');
            $this->form_validation->set_rules('password_salt', 'password_salt', 'required|matches[password_hash]');
            if ($this->form_validation->run() == FALSE)
            {
                $data['fail'] = true;
                $data['message'] = 'Validation Error';
            }
            else
            {
                $result =$this->User_model->set_user_data();
                if($result)
                {
                    $data['fail'] = true;
                    $data['message'] = 'Failed to add Customer ';
                }
                else
                {
                    $data['sucess'] = true;
                    $data['message'] = 'Sucessfully added Customer ';
                }
            }



                $data['page'] = array('header' => 'User New', 'description' => 'create a new user', 'app_name' => 'USER');
                $data['user'] = $_SESSION['user'];
                $data['apps'] = $_SESSION['apps'];
                $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-tasks');
                $tab2 = array('name' => 'New User', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-plus');
                $tab3 = array('name' =>  'User Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-circle-o');$data['tabs'] = array($tab1, $tab2,$tab3);
                $this->load->view('template/header', $data);
                $this->load->view('User/new', $data);
                $this->load->view('template/footer');

        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    public function Addnewrole()
    {
        if (isset($_SESSION['user'])) {

          $this->load->library('form_validation');
          $this->form_validation->set_rules('name', 'name', 'required|is_unique[role.name]');

            if ($this->form_validation->run() == FALSE)
                {
                        $data['fail'] = true;
                        $data['message'] = 'Validation Error';
                }
                else
                {
                        $result =$this->Role_model->set_role_data();
                        if($result)
                        {
                            $data['fail'] = true;
                            $data['message'] = 'Failed to add Role ';
                        }
                        else
                        {
                            $data['sucess'] = true;
                            $data['message'] = 'Sucessfully added ';
                        }
                }
            $data['page'] = array('header' => 'Role New', 'description' => 'create a new Role', 'app_name' => 'New Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'Back', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-arrow-circle-left');
            $data['tabs'] = array($tab1);
            $this->load->view('template/header', $data);
            $this->load->view('User/newrole_success', $data);
            $this->load->view('template/footer');
        } else {
            redirect('/Main/login', 'refresh');
        }
    }

    public function Addnewrole_after_success()
    {
        if (isset($_SESSION['user'])) {

            $this->Role_model->set_role_data();
            $data['page'] = array('header' => 'Role New', 'description' => 'create a new Role', 'app_name' => 'New Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'Back', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-arrow-circle-left');
            $data['tabs'] = array($tab1);
            $this->load->view('template/header', $data);
            $this->load->view('User/newrole_success', $data);
            $this->load->view('template/footer');
        } else {
            redirect('/Main/login', 'refresh');
        }
    }

    public function listuser()
    {
        if (isset($_SESSION['user']))
        {
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-tasks');
            $tab2 = array('name' => 'New User', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-user-plus');
            $tab3 = array('name' =>  'User Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-circle-o');
            $data['tabs'] = array($tab1, $tab2,$tab3);
            $data['users'] = $this->User_model->get_all_users();

            $this->load->view('template/header', $data);
            $this->load->view('User/listuser', $data);
            $this->load->view('template/footer');

        }
        else
        {
            redirect('/Main/login', 'refresh');
        }

    }

    public function userbyid($user_id)
    {
        if (isset($_SESSION['user'])) {
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $this->load->model('User_model');
            $data['users'] = $this->User_model->get_data_by_id($user_id);
            $this->load->view('template/header', $data);
            $this->load->view('User/view', $data);
        } else {
            redirect('/Main/login', 'refresh');
        }
    }

    public function newrole()
      {
          if (isset($_SESSION['user'])) {
              $data['page'] = array('header' => 'Role New', 'description' => 'create a new role', 'app_name' => 'New Role');
              $data['user'] = $_SESSION['user'];
              $data['apps'] = $_SESSION['apps'];
              $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-tasks');
              $tab2 = array('name' => 'New user', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-user-plus');
              $tab3 = array('name' => 'Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-gears');
              $data['tabs'] = array($tab1, $tab2, $tab3);

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
            $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-tasks');
            $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-user-plus');
            $tab3 = array('name'=>'Role','link'=>base_url().'/User/role', 'icon'=>'fa fa-gears');
            $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-plus-square');
            $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
            $data['data_tables'] = array('role_table');
            $data['roles'] = $this->Role_model->get_all_roles();
            $this->load->view('template/header',$data);
            $this->load->view('User/role',$data);
            $this->load->view('template/footer',$data);
        }
        else {
            redirect('/Main/login', 'refresh');
        }


    }

    public function userbyidview($id)
    {
        if (isset($_SESSION['user'])) {
            //$id = $this->input->post('id');
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->maketab($_SESSION['access'], $id);
            //$id = $this->input->post('id');
            $data['users'] = $this->User_model->get_data_by_id($id);
            $data['roles'] = $this->User_model->get_role($id);
            $this->load->view('template/header', $data);
            $this->load->view('User/view', $data);
            $this->load->view('template/footer');
        }
        else {
            redirect('/Main/login', 'refresh');
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['user'])) {
            //$id = $this->input->post('id');
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            //$id = $this->input->post('id');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['id'] = $id;
            //$_SESSION['id'] = $id;


            $this->load->view('template/header', $data);
            $this->load->view('User/edit', $data);
            $this->load->view('template/footer');

        }else {
            redirect('/Main/login', 'refresh');
        }


    }

    public function update($id)
    {
        if (isset($_SESSION['user'])) {
            //$id = $_SESSION['id'];
            $this->User_model->update($id);
            $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['users'] = $this->User_model->get_user_data();
            $data['tabs'] = $this->maketab($_SESSION['access'], $id);
            $this->load->view('template/header', $data);
            $this->load->view('User/listuser', $data);
            $this->load->view('template/footer');


        }else {
            redirect('/Main/login', 'refresh');
        }

    }

    public function delete_user()
    {
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['id'];
            $this->User_model->delete($id);
        }
    }

    public function edit_role($id)
    {
        if(isset($_SESSION['user'])){
            //$id = $this->input->post('id');
            $data['page'] = array('header'=>'Roles', 'description'=>'Edit info','app_name'=>'User Role Edit');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            //$data['tabs'] = $this->maketab($_SESSION['access'],$id);
        //$id = $this->input->post('id');
        $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-tasks');
        $tab2 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-gears');
        $tab3 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-plus-square');
        $data['tabs'] = array($tab1,$tab2,$tab3);
        $data['roles']=$this->Role_model->editrole($id);
        $data['accesses'] =$this->Role_model->get_object($id);
        //$data['projects'] =$this->Customer_model->get_project($id);
        $this->load->view('template/header',$data);
        $this->load->view('User/editrole',$data);
        $this->load->view('template/footer');}
    }

    public function delete_role($id){
        if(isset($_SESSION['user']))
        {
            //$id = $_SESSION['id'];
            $this->Role_model-> delete_role($id);
            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'Back', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-arrow-circle-left');
            $data['tabs'] = array($tab1);
            $data['roles']=$this->Role_model->get_role_data($_SESSION['user']['id']);
            //$data['data_tables'] = array('role_details');
            //$data['tabs'] = $this->maketab($_SESSION['access'],$id);
            $this->load->view('template/header',$data);
            $this->load->view('User/role_after_delete',$data);
            $this->load->view('template/footer');

        }
    }

    public function role_after_delete($id){
        if(isset($_SESSION['user']))
        {
            //$id = $_SESSION['id'];
            $this->Role_model-> delete_role($id);
            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'Back', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-arrow-circle-left');
            $data['tabs'] = array($tab1);
            $data['roles']=$this->Role_model->get_role_data($_SESSION['user']['id']);
            //$data['data_tables'] = array('role_details');
            //$data['tabs'] = $this->maketab($_SESSION['access'],$id);
            $this->load->view('template/header',$data);
            $this->load->view('User/role_after_delete',$data);
            $this->load->view('template/footer');

          }}

    public function update_role($id){
        if(isset($_SESSION['user']))
        {
            //$id = $_SESSION['id'];
            $this->Role_model->update($id);
            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-tasks');
            $tab2 = array('name' => 'New User', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-user-plus');
            $tab3 = array('name' =>  'User Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-gears');
            $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-plus-square');
            $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
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
            $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-tasks');
            $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-user-plus');
            $tab3 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-gears');
            $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-plus-square');
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
            $tab1 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-gears');
            $data['tabs'] = array($tab1);
            //$data['tabs'] = $this->maketab($_SESSION['access'],$id);
        //$id = $this->input->post('id');
        $data['roles']=$this->Role_model->get_data_by_id($id);
        $data['users'] =$this->Role_model->get_user($id);
        $data['accesses'] =$this->Role_model->get_object($id);
        $this->load->view('template/header',$data);
        $this->load->view('User/viewrole',$data);
        $this->load->view('template/footer');}
    }
    public function viewuser()
    {

       if(isset($_SESSION['user'])){
            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-circle-o');
            $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-circle-o');
            $tab3 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-circle-o');
            $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-circle-o');
            $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
            $id = $this->input->post('id');
            $data['users']= $this->User_model->get_data_by_id($id);
            $this->load->view('template/header',$data);
            $this->load->view('User/view',$data);
            $this->load->view('template/footer');

        }

    }
    public function updateuser(){
        if(isset($_SESSION['user'])){
            $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-circle-o');
            $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-circle-o');
            $tab3 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-circle-o');
            $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-circle-o');

            $newdata = array(
                'id'  => $id = $this->input->post('id')
            );

            $this->session->set_userdata($newdata);
            $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
            $this->load->view('template/header',$data);
            $this->load->view('User/edituser',$data);
            $this->load->view('template/footer');


        }
    }
    public function edituser(){
        $id =$_SESSION['id'];
        $this->User_model->update($id);
        $data['page'] = array('header'=>'User Roles', 'description'=>'Edit a role or Add new role','app_name'=>'Role');
        $data['user'] = $_SESSION['user'];
        $data['apps'] = $_SESSION['apps'];
        $tab1 = array('name'=>'User List','link'=>base_url().'/User/listuser', 'icon'=>'fa fa-circle-o');
        $tab2 = array('name'=>'New User','link'=>base_url().'/User/new', 'icon'=>'fa fa-circle-o');
        $tab3 = array('name'=>'Role','link'=>base_url().'/User/Role', 'icon'=>'fa fa-circle-o');
        $tab4 = array('name'=>'New Role','link'=>base_url().'/User/newrole', 'icon'=>'fa fa-circle-o');
        $data['tabs'] = array($tab1,$tab2,$tab3,$tab4);
        $this->load->view('template/header',$data);
        $this->load->view('User/edituser',$data);
        $this->load->view('template/footer');
    }
    public function deleteuser(){
        $id =$this->input->post('id');
        $this->User_model->delete($id);
        $data['page'] = array('header' => 'Users', 'description' => 'pick a user or create new user', 'app_name' => 'User');
        $data['user'] = $_SESSION['user'];
        $data['apps'] = $_SESSION['apps'];
        $tab1 = array('name' => 'User List', 'link' => base_url() . '/User/listuser', 'icon' => 'fa fa-tasks');
        $tab2 = array('name' => 'New User', 'link' => base_url() . '/User/new', 'icon' => 'fa fa-plus');
        $tab3 = array('name' =>  'User Role', 'link' => base_url() . '/User/role', 'icon' => 'fa fa-circle-o');
        $data['tabs'] = array($tab1, $tab2,$tab3);
        $data['users'] = $this->User_model->get_all_users();
        $data['data_tables'] = array('user_table');
        $this->load->view('template/header', $data);
        $this->load->view('User/listuser', $data);
        $this->load->view('template/footer',$data);

    }
}
