<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CardModel extends CI_Model {

	public function insert_card($form_array)
	{
		$insert = $this->db->insert('cards',$form_array);
		return $insert;
		
	}

	public function insert_game($form_array)
	{
		$insert = $this->db->insert('card_game',$form_array);
		return $this->db->insert_id();
	}

	public function inserts($form_array)
	{
		$insert = $this->db->insert('games',$form_array);
		return $this->db->insert_id();
	}

	public function getAllCards()
	{
		$this->db->order_by('card_id',"asc");
		$return = $this->db->get('cards')->result_array();
		return $return;
	}

	public function getAllRandomCards($card_number,$cards)
	{

		$query = $this->db->query("select * from cards where card_id not in (".$cards.") order by rand() limit ".$card_number." ");
		return $query->result_array();
	}

	function getScoreCard($game_id)
	{
		$this->db->select('count(game_id) as wincount,DATE(created_time) AS date,winner_palyer');
      	$this->db->group_by('winner_palyer');
      	$this->db->order_by('count(game_id)','desc');
      	$this->db->where('game_id',$game_id);
      	$return_user = $this->db->get('games')->result_array();
      	return $return_user;
	}

	function gamesturn($game_id)
	{
		$this->db->where("game_id", $game_id);
		$this->db->order_by('id','desc');
		$return = $this->db->get('games')->result_array();
		return $return;
	}


	function getUsersCard($game_id)
	{
		$this->db->where('game_id',$game_id);
		$return = $this->db->get('card_game')->row_array();
		return $return;
	}

	public function getSingleCard($card_id)
	{
	   $this->db->where('card_id',$card_id);
		$return = $this->db->get('cards')->row_array();
		return $return;
	}

	function update_banner($banner_id,$form_array)
	{
		$this->db->where('banner_id',$banner_id);
		$update = $this->db->update('banner',$form_array);
		return $update;
	}

	function delete_banner($banner_id)
	{
		$this->db->where('banner_id',$banner_id);
		$delete = $this->db->delete('banner');
		return $delete;
	}
}
