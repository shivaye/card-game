<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vision_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('vision',$form_array);
		return $insert;
		
	}

	public function getAllVision()
	{
		$return_frame_type = $this->db->get('vision')->result_array();
		return $return_frame_type;
	}


	function get_single_record($vision_id)
	{
		$this->db->where('id',$vision_id);
		$query = $this->db->get_where('vision')->row_array();

		return $query;
	}

	function update_vision($vision_id,$form_array)
	{
		$this->db->where('id',$vision_id);
		$update = $this->db->update('vision',$form_array);
		return $update;
	}

	function delete_vision($vision_id)
	{
		$this->db->where('id',$vision_id);
		$delete = $this->db->delete('vision');
		return $delete;
	}

	
}
