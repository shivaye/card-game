<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colour_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('color',$form_array);
		return $insert;
		
	}

	public function getAllColour()
	{
		$return_category = $this->db->get('color')->result_array();
		return $return_category;
	}

	public function getUsers()
	{
		$return = $this->db->get('import')->result_array();
		return $return;
	}

	function insert($data)
	{
		$return_category = $this->db->insert_batch('import', $data);
		return $return_category;
	}


	function get_single_record($colour_id)
	{
		$this->db->where('id',$colour_id);
		$query = $this->db->get_where('color')->row_array();

		return $query;
	}

	function update_colour($colour_id,$form_array)
	{
		$this->db->where('id',$colour_id);
		$update = $this->db->update('color',$form_array);
		return $update;
	}

	function delete_colour($colour_id)
	{
		$this->db->where('id',$colour_id);
		$delete = $this->db->delete('color');
		return $delete;
	}

	
}
