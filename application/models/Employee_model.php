<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('employee',$form_array);
		return $insert;
		
	}

	public function getAllEmployee()
	{
		$return_employee = $this->db->get('employee')->result_array();
		return $return_employee;
	}

	function get_single_record($employee_id)
	{
		$this->db->where('employee_id',$employee_id);
		$query = $this->db->get_where('employee')->row_array();

		return $query;
	}

	function update_employee($employee_id,$form_array)
	{
		$this->db->where('employee_id',$employee_id);
		$update = $this->db->update('employee',$form_array);
		return $update;
	}

	function delete_employee($employee_id)
	{
		$this->db->where('employee_id',$employee_id);
		$delete = $this->db->delete('employee');
		return $delete;
	}
}
