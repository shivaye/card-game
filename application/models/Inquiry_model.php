<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry_model extends CI_Model {


	public function getAllinquiry()
	{
		$return_inquiry = $this->db->get('inquiry')->result_array();
		return $return_inquiry;
	}

	public function getAllTickets()
	{

	$this->db->order_by('ticket_id',"desc");
	$return_inquiry = $this->db->get('tickets')->result_array();
	return $return_inquiry;
}

function get_single_record($inquiry_id)
{
	$this->db->where('inquiry_id',$inquiry_id);
	$query = $this->db->get_where('inquiry')->row_array();

	return $query;
}

function delete_inquiry($inquiry_id)
{
	$this->db->where('inquiry_id',$inquiry_id);
	$delete = $this->db->delete('inquiry');
	return $delete;
}

public function getAllnewsletter()
{
	$return_newsletter = $this->db->get('newsletter')->result_array();
	return $return_newsletter;
}

public function getAllcallme()
{
	$return_callme = $this->db->get('call_me')->result_array();
	return $return_callme;
}

public function getAllPoints()
{
	$getAllPoints = $this->db->select('*')
	->from('reedeem_points')
	->join('user1','user1.id = reedeem_points.user_id')
	->get()->result_array();
	return $getAllPoints;

		// $getAllPoints = $this->db->get('reedeem_points')->result_array();
		// return $getAllPoints;
}

public function update_reedeem($id,$formarray)
{
	$this->db->where('point_id',$id);
	$query = $this->db->update('reedeem_points',$formarray);
	return $query;
}

public function ticket_chats($user_id,$ticket_id)
{

	$this->db->order_by('chat_id',"asc");
	$this->db->where('ticket_id', $ticket_id);
	return  $this->db->select('*')
	->from('ticket_chat')
	->get()->result_array();
}

public function create_ticket_msg($form_array)
{
	$insert = $this->db->insert('ticket_chat',$form_array);
	return $insert;
}

}
