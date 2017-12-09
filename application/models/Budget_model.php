<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Budget_model extends CI_Model
{

	public function __construct()
	{

	}

	public function get_stages_by_project($project_id)
	{
		$query = $this->db->get_where('budget_stage', array("project_id"=>$project_id));
		return $query->result();
	}

	public function get_entries_material_by_stage($stage_id)
	{
		$query = 'SELECT
			i.name as item_name,
			i.id as item_id,
			i.unit as item_unit,
			be.id as budget_entry_id
			FROM
			budget_entry_material as be JOIN
			inventory_item as i
			on be.inventory_item_id = i.id

			WHERE be.budget_stage_id = '.$stage_id;
		$query = $this->db->query($query);
		return $query->result();
	}
	public function get_entries_payments_by_stage($stage_id)
	{
		$query = 'SELECT
			be.name as name,
			be.id as budget_entry_id
			FROM
			budget_entry_other as be

			WHERE be.budget_stage_id = '.$stage_id;
		$query = $this->db->query($query);
		return $query->result();
	}
}