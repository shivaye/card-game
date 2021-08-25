<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('pakka_top_coupon_category',$form_array);
		return $this->db->insert_id();
		
	}

	public function create_coupon_category_offer($form_array)
	{
		$insert = $this->db->insert('pakka_top_coupon_category_offer',$form_array);
		return $this->db->insert_id();
	}

	public function getAllCategory()
	{	$this->db->order_by("display_order", "asc");
		$return_category = $this->db->get('pakka_top_coupon_category')->result_array();
		return $return_category;
	}

	public function pakka_retailer_offer_details()
	{	$this->db->order_by("id", "desc");
		$return_category = $this->db->get('pakka_retailer_offer_details')->result_array();
		return $return_category;
	}

	public function getpakka_top_coupon_category_offer()
	{
		$query = $this->db->select("*,pakka_retailer_offer_details.offer_id,pakka_retailer_offer_details.offer_desc,pakka_top_coupon_category_offer.id as did")
		->from("pakka_top_coupon_category_offer")
		->join('pakka_retailer_offer_details', 'pakka_retailer_offer_details.offer_id = pakka_top_coupon_category_offer.offer_id', 'left')
		->join('pakka_top_coupon_category', 'pakka_top_coupon_category.id = pakka_top_coupon_category_offer.top_coupon_cat_id', 'left')
		->get()->result_array();
		return $query;
	}


	function get_single_record($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get_where('pakka_top_coupon_category')->row_array();

		return $query;
	}

	function get_single_record_by_slug($slug)
	{
		$this->db->where('category_slug',$slug);
		$query = $this->db->get_where('pakka_top_coupon_category')->row_array();

		return $query;
	}

	function update_category($id,$form_array)
	{
		$this->db->where('id',$id);
		$update = $this->db->update('pakka_top_coupon_category',$form_array);
		return $update;
	}

	function delete_category($id)
	{
		$this->db->where('id',$id);
		$delete = $this->db->delete('pakka_top_coupon_category');
		return $delete;
	}

	function delete_offer_category($id)
	{
		$this->db->where('top_coupon_cat_id',$id);
		$delete = $this->db->delete('pakka_top_coupon_category_offer');
		return $delete;
	}

	public function delete_pakka_top_coupon_category_offer($id)
	{
		$this->db->where('id',$id);
		$delete = $this->db->delete('pakka_top_coupon_category_offer');
		return $delete;
	}

	
}
