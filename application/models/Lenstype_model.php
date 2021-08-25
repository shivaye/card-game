<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lenstype_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('lens_type',$form_array);
		return $insert;
		
	}

	public function getAlllenstype()
	{
		$return_frame_type = $this->db->select('*')
		->from('lens_type')
		->join('vision','vision.id = lens_type.vision_id')
		->get()->result_array();
		return $return_frame_type;
	}


	function get_single_record($vision_id)
	{
		$this->db->where('id',$vision_id);
		$query = $this->db->get_where('lens_type')->row_array();

		return $query;
	}

	function update_vision($vision_id,$form_array)
	{
		$this->db->where('id',$vision_id);
		$update = $this->db->update('lens_type',$form_array);
		return $update;
	}

	function delete_vision($vision_id)
	{
		$this->db->where('id',$vision_id);
		$delete = $this->db->delete('lens_type');
		return $delete;
	}

	
}
