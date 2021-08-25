<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function getAllnewOrders($status)
	{	
		$this->db->where('status',$status);
		$this->db->order_by("id", "desc");
		$return_orders = $this->db->get('orders')->result_array();
		return $return_orders;
	}

	public function getAllrejectedOrders($status)
	{	
		$this->db->where('status',$status);
		$this->db->order_by("id", "desc");
		$return_orders = $this->db->get('orders')->result_array();
		return $return_orders;
	}

	public function getAllcompletedOrders($status)
	{	
		$this->db->where('status',$status);
		$this->db->order_by("id", "desc");
		$return_orders = $this->db->get('orders')->result_array();
		return $return_orders;
	}

	public function OrderDetail($id)
	{
		$this->db->where('trx_id',$id);
		$order_detail = $this->db->get('orders')->row_array();
		return $order_detail;
	}

	public function OrderItems($id)
	{
		$this->db->group_by('product_images.product_id');
		$this->db->where('order_items.order_id',$id);
		$this->db->join('product_images', 'product_images.product_id = order_items.product_id', 'left');
		$order_detail = $this->db->get('order_items')->result_array();
		return $order_detail;
	}

	public function UserCartProducts($cart_ids){
		
		$this->db->where_in('id',$cart_ids, FALSE);
		$query =  $this->db->get('cart_user');
		return $query->result_array();
	}

	public function get_single_record($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get_where('orders')->row_array();
		return $query;
	}	

	public function update_order($id,$form_array)
	{
		$this->db->where('id',$id);
		$update = $this->db->update('orders',$form_array);
		return $update;
	}


}
