<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('faq',$form_array);
		return $insert;
		
	}

	public function getAllfaq()
	{
		$this->db->order_by("order_id", "asc");
		$return_faq = $this->db->get('faq')->result_array();
		return $return_faq;
	}

	function get_single_record($faq_id)
	{
		$this->db->where('faq_id',$faq_id);
		$query = $this->db->get_where('faq')->row_array();
		return $query;
	}

	function update_faq($faq_id,$form_array)
	{
		$this->db->where('faq_id',$faq_id);
		$update = $this->db->update('faq',$form_array);
		return $update;
	}

	function delete_faq($faq_id)
	{
		$this->db->where('faq_id',$faq_id);
		$delete = $this->db->delete('faq');
		return $delete;
	}
}
