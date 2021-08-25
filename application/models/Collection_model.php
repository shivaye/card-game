<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('product_collection',$form_array);
		return $insert;
		
	}

	public function getAllCollection()
	{						
		$return_category = $this->db->get('product_collection')->result_array();
		return $return_category;
	}

	function get_single_record($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get_where('product_collection')->row_array();
		return $query;
	}

	function update_category($id,$form_array)
	{
		$this->db->where('id',$id);
		$update = $this->db->update('product_collection',$form_array);
		return $update;
	}

	function delete_category($id)
	{
		$this->db->where('id',$id);
		$delete = $this->db->delete('product_collection');
		return $delete;
	}

	
}
