<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Power_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('power',$form_array);
		return $insert;
		
	}

	public function getAllPower()
	{
		$return_power = $this->db->get('power')->result_array();
		return $return_power;
	}


	function get_single_record($power_id)
	{
		$this->db->where('id',$power_id);
		$query = $this->db->get_where('power')->row_array();

		return $query;
	}

	function update_power($power_id,$form_array)
	{
		$this->db->where('id',$power_id);
		$update = $this->db->update('power',$form_array);
		return $update;
	}

	function delete_power($power_id)
	{
		$this->db->where('id',$power_id);
		$delete = $this->db->delete('power');
		return $delete;
	}

	
}
