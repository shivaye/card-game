<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('brands',$form_array);
		return $insert;
		
	}

	public function getAllBrands()
	{
		$return_category = $this->db->get('brands')->result_array();
		return $return_category;
	}


	function get_single_record($brand_id)
	{
		$this->db->where('brand_id',$brand_id);
		$query = $this->db->get_where('brands')->row_array();

		return $query;
	}

	function update_brand($brand_id,$form_array)
	{
		$this->db->where('brand_id',$brand_id);
		$update = $this->db->update('brands',$form_array);
		return $update;
	}

	function delete_brands($brand_id)
	{
		$this->db->where('brand_id',$brand_id);
		$delete = $this->db->delete('brands');
		return $delete;
	}

	
}
