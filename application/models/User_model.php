<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model
{

    public function __construct()
    {

    }

    public function set_user_data()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'role_id' => $this->input->post('role_id')
        );
        $this->db->insert('user', $data);
    }

	public function get_all_users()
	{
        $this->db->where('active', '1');
		$query = $this->db->get('user');
		return $query->result();
	}

    public function get_user_data($user_id)
    {
        $this->db->where('active', '1');
        $this->db->where('id', $user_id);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function get_data_by_id($id)
    {

        $this->db->where('id', $id);
        $this->db->where('active', '1');
        $query = $this->db->get('user');
        return $query->result();


    }

    public function get_role($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user_has_role');
        return $query->result();
    }

    public function update($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'role_id' => $this->input->post('role_id'),
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }


    public function delete($id)
    {
        $data = array(
            'active' => '0'
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

	public function get_team_members($project_id)
	{
		$query = "SELECT r.name as role_name, u.name as user_name, u.id as id  FROM user as u JOIN team_member as tm on u.id = tm.user_id JOIN role as r on r.id = u.role_id WHERE u.active = 1 AND tm.project_id = ".$project_id;
		$query = $this->db->query($query);
		return $query->result();
	}

	public function get_non_team_users($project_id)
	{
		$query ="SELECT u.id FROM user as u JOIN team_member as tm on tm.user_id=u.id WHERE tm.project_id = ".$project_id;
		$query = $this->db->query($query);
		$users = $query->result();
		if($query->num_rows())
		{
			$query = 'SELECT r.name as role_name, u.name as user_name, u.id as id  FROM user as u JOIN role as r on r.id = u.role_id WHERE u.active = 1 AND NOT (';
			for ($i=0; $i< sizeof($users)-1 ;$i++) {
				$query = $query.' u.id = "'.$users[$i]->id.'" OR';
			}
			$query = $query.' u.id = "'.$users[$i]->id.'")';
		}
		else
		{
			$query = 'SELECT r.name as role_name, u.name as user_name, u.id as id  FROM user as u JOIN role as r on r.id = u.role_id WHERE u.active = 1';
		}
		$query = $this->db->query($query);
		return $query->result();
	}

	public function add_team_member($project_id, $user_id)
	{
		$query = 'INSERT INTO team_member(user_id,project_id) VALUES ("'.$user_id.'" ,'.$project_id.')';
		$query = $this->db->query($query);
		return $this->db->affected_rows();
	}

	public function remove_team_member($project_id, $user_id)
	{
		$this->db->trans_begin();
		$query ='DELETE FROM `team_member` WHERE `project_id`= '.$project_id.' AND `user_id` = "'.$user_id.'" ';
		echo $query;
		$this->db->query($query);
		// //$result = $this->db->delete('team_member', array('user_id' => $user_id, 'project_id' => (int)$project_id));
		// return $this->db->affected_rows();

		// $this->db->where('project_id',(int)$project_id);
		//     $this->db->where('user_id',$user_id);
		//     $this->db->delete('team_member');
		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		        return 0;
		}
		else
		{
		        $this->db->trans_commit();
		        return 1;
		}
	}


	public function create_approving_user($project_id, $data_ary)
	{
		$this->db->trans_begin();

		$data['user_id'] = $data_ary['id'];
		$data1['user_id'] = $data_ary['id'];
		$data['project_id'] = $project_id;
		$data1['project_id'] = $project_id;
		if(isset($data_ary['request']))
		{
			$data['request'] = 1;
			$data1['request'] = 1;
		}
		else
		{
			$data['request'] = 0;
			$data1['request'] = 0;
		}
		if(isset($data_ary['purchase']))
			$data['order'] = 1;
		else
			$data['order'] = 0;
		if(isset($data_ary['approve']))
		{
			$data['approve'] = 1;
			$data1['approve'] = 1;
		}
		else
		{
			$data['approve'] = 0;
			$data1['approve'] = 0;
		}
		if(isset($data_ary['recive']))
			$data['recive'] = 1;
		else
			$data['recive'] = 0;
		if(isset($data_ary['pay']))
		{
			$data['pay'] = 1;
			$data1['pay'] = 1;
		}
		else
		{
			$data['pay'] = 0;
			$data1['pay'] = 0;
		}

		$query = $this->db->get_where( 'material_transaction_approving_user', array('project_id'=>$project_id, 'user_id'=>$data_ary['id']));
		if($query->num_rows())
		{
			$query = 'UPDATE material_transaction_approving_user SET request = '.$data['request'].' , approve = '.$data['approve'].', `order` = '.$data['order'].', recive = '.$data['recive'].', pay = '.$data['pay'].' WHERE project_id = '.$project_id.' AND user_id = "'.$data['user_id'].'"';
			$this->db->query($query);
		}
		else
		{
			$this->db->insert('material_transaction_approving_user' , $data);
		}

		$query = $this->db->get_where( 'other_payment_approving_user', array('project_id'=>$project_id, 'user_id'=>$data_ary['id']));
		if($query->num_rows())
		{
			$query = 'UPDATE other_payment_approving_user SET request = '.$data1['request'].', approve = '.$data1['approve'].', pay = '.$data1['pay'].' WHERE project_id = '.$project_id.' AND user_id = "'.$data['user_id'].'"';
			$this->db->query($query);
		}
		else
		{
			$this->db->insert('other_payment_approving_user' , $data1);
		}

		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		        return 0;
		}
		else
		{
		        $this->db->trans_commit();
		        return 1;
		}
	}
	public function getrole(){
        $query = $this->db->get('role');
        return $query->result();
    }
}




