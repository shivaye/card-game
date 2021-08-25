<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('coupon',$form_array);
		return $insert;
		
	}

	public function getAllCoupon()
	{
		$return_coupon = $this->db->get('coupon')->result_array();
		return $return_coupon;
	}

	public function getcoupons()
	{	
		$this->db->where('start_date >=', date("Y-m-d"));
		$return_coupon = $this->db->get('coupon')->result_array();
		// print_r($this->db->last_query());
		// exit();
		return $return_coupon;
	}

	function get_single_record($coupon_id)
	{
		$this->db->where('coupon_id',$coupon_id);
		$query = $this->db->get_where('coupon')->row_array();

		return $query;
	}

	function get_coupon_code($coupon_code)
	{
		$this->db->where('coupon_code',$coupon_code);
		$query = $this->db->get_where('coupon')->row_array();
		return $query;
	}

	function update_coupon($coupon_id,$form_array)
	{
		$this->db->where('coupon_id',$coupon_id);
		$update = $this->db->update('coupon',$form_array);
		return $update;
	}

	function delete_coupon($coupon_id)
	{
		$this->db->where('coupon_id',$coupon_id);
		$delete = $this->db->delete('coupon');
		return $delete;
	}
}
