<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('banner',$form_array);
		return $insert;
		
	}

	public function getAllBannner()
	{
		$return_banner = $this->db->get('banner')->result_array();
		return $return_banner;
	}

	function get_single_record($banner_id)
	{
		$this->db->where('banner_id',$banner_id);
		$query = $this->db->get_where('banner')->row_array();

		return $query;
	}

	function update_banner($banner_id,$form_array)
	{
		$this->db->where('banner_id',$banner_id);
		$update = $this->db->update('banner',$form_array);
		return $update;
	}

	function delete_banner($banner_id)
	{
		$this->db->where('banner_id',$banner_id);
		$delete = $this->db->delete('banner');
		return $delete;
	}
}
