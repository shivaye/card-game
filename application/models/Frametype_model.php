<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frametype_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('frame_type',$form_array);
		return $insert;
		
	}

	public function getAllFrametype()
	{
		$return_frame_type = $this->db->get('frame_type')->result_array();
		return $return_frame_type;
	}


	function get_single_record($frame_type_id)
	{
		$this->db->where('id',$frame_type_id);
		$query = $this->db->get_where('frame_type')->row_array();

		return $query;
	}

	function update_frame_type($frame_type_id,$form_array)
	{
		$this->db->where('id',$frame_type_id);
		$update = $this->db->update('frame_type',$form_array);
		return $update;
	}

	function delete_frame_type($frame_type_id)
	{
		$this->db->where('id',$frame_type_id);
		$delete = $this->db->delete('frame_type');
		return $delete;
	}

	
}
