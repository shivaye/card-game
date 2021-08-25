<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prize_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('prize',$form_array);
		return $insert;
		
	}

	public function getAllPrize()
	{
		$this->db->order_by("prize_id", "desc");
		$return_prize = $this->db->get('prize')->result_array();
		return $return_prize;
	}

	function get_single_record($prize_id)
	{
		$this->db->where('prize_id',$prize_id);
		$query = $this->db->get_where('prize')->row_array();

		return $query;
	}

	function update_prize($prize_id,$form_array)
	{
		$this->db->where('prize_id',$prize_id);
		$update = $this->db->update('prize',$form_array);
		return $update;
	}

	function delete_prize($prize_id)
	{
		$this->db->where('prize_id',$prize_id);
		$delete = $this->db->delete('prize');
		return $delete;
	}
}
