<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homeoffer_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('home_offer_products',$form_array);
		return $insert;
		
	}

	public function getAllOfferPorudcts()
	{	
		$this->db->order_by('position',"asc");
		$return = $this->db->get('home_offer_products')->result_array();
		return $return;
	}

	public function getAllHomeProducts($limit,$offset)
	{	
		$this->db->order_by('position',"asc");
		$this->db->where('status',"1");
		$this->db->limit($offset,$limit);
		$return = $this->db->get('home_offer_products')->result_array();
		// print_r($this->db->last_query());
		// exit();
		return $return;
	}

	function get_single_record($home_offer_id)
	{
		$this->db->where('home_offer_id',$home_offer_id);
		$query = $this->db->get_where('home_offer_products')->row_array();

		return $query;
	}

	function update_offer($home_offer_id,$form_array)
	{
		$this->db->where('home_offer_id',$home_offer_id);
		$update = $this->db->update('home_offer_products',$form_array);
		return $update;
	}

	function delete_banner($home_offer_id)
	{
		$this->db->where('home_offer_id',$home_offer_id);
		$delete = $this->db->delete('home_offer_products');
		return $delete;
	}
}
