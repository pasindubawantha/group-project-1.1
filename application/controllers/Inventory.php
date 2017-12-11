<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inventory_model');
        $this->load->model('Project_model');
    }

    public function index()
    {
        if(isset($_SESSION['user']))
        {
            $project_id = 1;
            $data['page'] = array('header'=>'Inventory stock', 'description'=>'inventory stock','app_name'=>'INVENTORY');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs($_SESSION['access']);
            $data['data_tables'] = array('table_stock_log');
            $data['stocks'] = $this->Inventory_model->get_stock($project_id);
            $this->load->view('template/header',$data);
            $this->load->view('Inventory/inventory_stock',$data);
            $this->load->view('template/footer',$data);
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

     public function inventory_dashboard()
    {
    	$project_id = 1;
        if(isset($_SESSION['user']))
        {
            if(isset($_POST['item_id']))
            {
                if($_POST['no_of_units']!="")
                {
                    if(isset($_POST['out']))
                    {//transfer out
                        $result = $this->Inventory_model->stock_out($project_id, $_POST['item_id'], $_POST['no_of_units'], $_SESSION['user']['id']);
                    }
                    else
                    {//transfer to main
                        $result = $this->Inventory_model->stock_transfer($_POST['item_id'],$_POST['no_of_units'],1,$_POST['to_project_id'],$_SESSION['user']['id']);
                    }
                    if($result)
                    {
                        $data['sucess'] = true;
                        $data['message'] = 'Sucessfully transfered';
                    }
                    else
                    {
                        $data['fail'] = true;
                        $data['message'] = 'Failed to transfer';
                    }
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = 'Please enter an ammount to transfer';
                }
            }
            $data['projects'] = $this->Project_model->get_all_projects();
            $data['page'] = array('header'=>'Inventory Dashboard', 'description'=>'do stock operations here','app_name'=>'INVENTORY');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs($_SESSION['access'],$project_id);
            $data['data_tables'] = array('table_stock_log');
            $data['stocks'] = $this->Inventory_model->get_stock($project_id);
            $this->load->view('template/header',$data);
            $this->load->view('Inventory/inventory_dashboard',$data);
            $this->load->view('template/footer',$data);
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    public function inventory_log()
    {
    	$project_id = 1;
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Inventory log', 'description'=>'log of all inventory tansactions','app_name'=>'INVENTORY');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs($_SESSION['access'],$project_id);
            $data['project_id'] = $project_id;
            $data['data_tables'] = array('table_stock_log');
            $data['logs'] = $this->Inventory_model->get_stock_log($project_id);
            $this->load->view('template/header',$data);
            $this->load->view('Inventory/inventory_log',$data);
            $this->load->view('template/footer',$data);
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    public function item_list()
    {
        if(isset($_SESSION['user']))
        {
            if(isset($_POST['new_item_form']))
            {
                $result = $this->Inventory_model->add_new_item($_POST['item_name'],$_POST['item_unit']);
                if($result)
                {
                    $data['sucess'] = true;
                    $data['message'] = 'Sucessfully added the item';
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = 'Failed to add the item';
                }
            }
            $data['page'] = array('header'=>'Inventory Items', 'description'=>'add , edite  ypur items here','app_name'=>'INVENTORY');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs($_SESSION['access']);
            $data['data_tables'] = array('table_items');
            $data['items'] = $this->Inventory_model->get_all_items();
            $this->load->view('template/header',$data);
            $this->load->view('Inventory/item_list',$data);
            $this->load->view('template/footer',$data);
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    public function price_list($list_id=NULL)
    {
        if(isset($_SESSION['user']))
        {
            if($list_id==NULL)
            {
                if(isset($_POST['new_list_form']))
                {
                    $result = $this->Inventory_model->add_new_price_list($_POST['list_name']);
                    if($result)
                    {
                        $data['sucess'] = true;
                        $data['message'] = 'Sucessfully added the item';
                    }
                    else
                    {
                        $data['fail'] = true;
                        $data['message'] = 'Failed to add the item';
                    }
                }
                $data['page'] = array('header'=>'Inventory Price Lists', 'description'=>'manage your price lists here','app_name'=>'INVENTORY');
                $data['user'] = $_SESSION['user'];
                $data['apps'] = $_SESSION['apps'];
                $data['tabs'] = $this->make_tabs($_SESSION['access']);
                $data['data_tables'] = array('table_price_lists');
                $data['lists'] = $this->Inventory_model->get_all_price_lists();
                $this->load->view('template/header',$data);
                $this->load->view('Inventory/price_lists',$data);
                $this->load->view('template/footer',$data);
            }
            else
            {
                if(isset($_POST['new_price_form']))
                {
                    var_dump($_POST);
                    $result = $this->Inventory_model->add_new_price($_POST['new_item_id'],$list_id,$_POST['new_price']);
                    if($result)
                    {
                        $data['sucess'] = true;
                        $data['message'] = 'Sucessfully added the item';
                    }
                    else
                    {
                        $data['fail'] = true;
                        $data['message'] = 'Failed to add the item';
                    }
                }
                $data['page'] = array('header'=>'Inventory Price List ', 'description'=>'manage your price lists here','app_name'=>'INVENTORY');
                $data['user'] = $_SESSION['user'];
                $data['apps'] = $_SESSION['apps'];
                $data['tabs'] = $this->make_tabs($_SESSION['access']);
                $data['data_tables'] = array('table_prices');
                $data['prices'] = $this->Inventory_model->get_all_prices($list_id);
                $data['items'] = $this->Inventory_model->get_all_items();
                $data['list_id'] = $list_id;
                $this->load->view('template/header',$data);
                $this->load->view('Inventory/single_price_list',$data);
                $this->load->view('template/footer',$data);
            }
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    function make_tabs($access)
    {
        //Inventory
        $tab1_1 = array('name'=>'Stock','link'=>base_url().'/Inventory', 'icon'=>'fa fa-fw fa-circle-o');
        $tab1_2 = array('name'=>'Dashboard','link'=>base_url().'/Inventory/inventory_dashboard/' , 'icon'=>'fa fa-fw fa-circle-o');
        $tab1_3 = array('name'=>'Log','link'=>base_url().'/Inventory/inventory_log/' , 'icon'=>'fa fa-fw fa-circle-o');
        $tab1 = array('name'=>'Inventory', 'icon'=>'fa fa-fw fa-cubes', 'next_level'=>array($tab1_1,$tab1_2,$tab1_3));
        //Items
        $tab2 = array('name'=>'Item list','link'=>base_url().'/Inventory/item_list/' , 'icon'=>'fa fa-fw fa-cube');
        //Price list
        $tab3 = array('name'=>'Price list','link'=>base_url().'/Inventory/price_list/' , 'icon'=>'fa fa-fw fa-money');
        return array($tab1,$tab2,$tab3);
    }
}
