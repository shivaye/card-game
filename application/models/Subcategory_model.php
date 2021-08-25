<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('subcategory',$form_array);
		return $insert;
		
	}

	public function getAllSubCategory()
	{
		$return_subcategory = $this->db->select('*')
		->from('subcategory')
		->join('category','category.category_id = subcategory.category_id')
		->order_by("subposition", "asc")
		->get()->result_array();
		return $return_subcategory;
	}


     public function headersubcatergory($category_id)
	{
		$return_header_subcategory = $this->db->select('*')
		->from('subcategory')
		->where("category_id",$category_id)
		->get()->result_array();
		return $return_header_subcategory;
	}
    

	function get_single_record($subcategory_id)
	{
		$this->db->where('subcategory_id',$subcategory_id);
		$query = $this->db->get_where('subcategory')->row_array();

		return $query;
	}

	function getSubCategoryId($subcategory_slug)
	{
		$this->db->where('subcategory_slug',$subcategory_slug);
		$query = $this->db->get_where('subcategory')->row_array();
		return $query;
	}

	function get_single_record_by_slug($slug)
	{
		$this->db->where('subcategory_slug',$slug);
		$query = $this->db->get_where('subcategory')->row_array();

		return $query;
	}

	function update_subcategory($subcategory_id,$form_array)
	{
		$this->db->where('subcategory_id',$subcategory_id);
		$update = $this->db->update('subcategory',$form_array);
		return $update;
	}

	function delete_category($subcategory_id)
	{
		$this->db->where('subcategory_id',$subcategory_id);
		$delete = $this->db->delete('subcategory');
		return $delete;
	}

	
}
