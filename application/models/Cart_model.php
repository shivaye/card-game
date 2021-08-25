<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart_model extends CI_Model {

	public function addcart($form_array)
	{
		$insert = $this->db->insert('cart_user',$form_array);
		return $insert;
	}

	public function addtowishlist($form_array)
	{
		$insert = $this->db->insert('wishlist',$form_array);
		return $insert;
	}

	public function create_powers($form_array)
	{
		$insert = $this->db->insert('user_power',$form_array);
		return $insert;
	}

	public function create_ticket($form_array)
	{
		$insert = $this->db->insert('tickets',$form_array);
		return $insert;
	}

	public function create_ticket_msg($form_array)
	{
		$insert = $this->db->insert('ticket_chat',$form_array);
		return $insert;
	}

	public function GetSingleSavedPower($user_id,$saved_power_id)
	{
		$this->db->where('id',$saved_power_id);
		$this->db->where('user_id',$user_id);
		$savedpowers = $this->db->get('user_power')->row_array();
		return $savedpowers;
	}

	public function getOrderId($order_id)
	{
		$this->db->where('order_id',$order_id);
		$order_id = $this->db->get('orders')->row_array();
		return $order_id;
	}

	public function getAddressbyId($user_id,$address_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->where('id',$address_id);
		$id = $this->db->get('user_address1')->row_array();
		return $id;
	}

	public function getAllCart($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('cart_status', 0);
		$return_cart = $this->db->get('cart_user')->result_array();
		return $return_cart;
	}

	public function getAllPrize()
	{
		$this->db->order_by("prize_id", "desc");
		$this->db->where('status', 1);
		$return_prize = $this->db->get('prize')->result_array();
		return $return_prize;
	}

	public function getAllWishlist($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('cart_status', 0);
		$return_wishlist = $this->db->get('wishlist')->result_array();
		return $return_wishlist;
	}

	public function allReedeems($user_id)
	{
		$this->db->where('user_id', $user_id);
		$return_reedeems = $this->db->get('reedeem_points')->result_array();
		return $return_reedeems;
	}

	public function get_single_record($id,$user_id)
	{
		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get_where('cart_user')->row_array();
		return $query;
	}


	public function get_single_record_wishlist($id,$user_id)
	{
		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get_where('wishlist')->row_array();
		return $query;
	}

	public function update($id,$form_array)
	{
		$this->db->where('id',$id);
		$query = $this->db->update('cart_user',$form_array);
		return $query;
	}

	public function update_order($id,$order_id,$form_array)
	{
		$this->db->where('order_id',$order_id);
		$this->db->where('user_id',$id);
		$query = $this->db->update('orders',$form_array);
		return $query;
	}

	public function delete($id,$user_id)
	{
		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);
		$delete = $this->db->delete('cart_user');
		return $delete;
	}

	public function delete_wishlist($id,$user_id)
	{
		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);
		$delete = $this->db->delete('wishlist');
		return $delete;
	}

	public function getUserPoints($user_id)
	{
		$this->db->where('user_id',$user_id);
		$query = $this->db->get_where('user_points')->row_array();
		return $query;
	}

	public function create_point_history($history)
	{
		$insert = $this->db->insert('user_points_history',$history);
		return $insert;
	}

	public function insert_points($points)
	{
		$insert = $this->db->insert('user_points',$points);
		return $insert;
	}

	public function update_points($user_id,$points)
	{
		$this->db->where('user_id',$user_id);
		$query = $this->db->update('user_points',$points);
		return $query;
	}

	public function reedeem_points($form_array)
	{
		$insert = $this->db->insert('reedeem_points',$form_array);
		return $insert;
	}

}