<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Powerlenses_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('powerlenses',$form_array);
		return $insert;
		
	}

	public function getAllPowerlenses()
	{
		$getAllPowerlenses = $this->db->select('*')
		->from('powerlenses')
		->join('power','power.id = powerlenses.power_id')
		->get()->result_array();

		return $getAllPowerlenses;
	}


	public function getAllonlyLenses($lens_id)
	{
		// shivam
		$this->db->where('power_id',$lens_id);
		$this->db->where('type',1);
		$this->db->join('power','power.id = powerlenses.power_id');
		$getAllPowerlenses = $this->db->select('*')
		->from('powerlenses')
		->get()->result_array();
		return $getAllPowerlenses;
	}


	function get_single_record($power_id)
	{
		$this->db->where('lenses_id',$power_id);
		$query = $this->db->get_where('powerlenses')->row_array();

		return $query;
	}

	function update_power($power_id,$form_array)
	{
		$this->db->where('lenses_id',$power_id);
		$update = $this->db->update('powerlenses',$form_array);
		return $update;
	}

	function delete_power($power_id)
	{
		$this->db->where('lenses_id',$power_id);
		$delete = $this->db->delete('powerlenses');
		return $delete;
	}

	
}
