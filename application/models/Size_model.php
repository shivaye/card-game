<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('size',$form_array);
		return $insert;
		
	}

	public function getAllSize()
	{
		$return_size = $this->db->get('size')->result_array();
		return $return_size;
	}


	function get_single_record($size_id)
	{
		$this->db->where('size_id',$size_id);
		$query = $this->db->get_where('size')->row_array();

		return $query;
	}


	function update_size($size_id,$form_array)
	{
		$this->db->where('size_id',$size_id);
		$update = $this->db->update('size',$form_array);
		return $update;
	}

	function delete_size($size_id)
	{
		$this->db->where('size_id',$size_id);
		$delete = $this->db->delete('size');
		return $delete;
	}

	
}
