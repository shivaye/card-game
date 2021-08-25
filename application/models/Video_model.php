<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('videos',$form_array);
		return $insert;
		
	}

	public function getAllvideo()
	{
		$this->db->order_by("video_id", "desc");
		$return_video = $this->db->get('videos')->result_array();
		return $return_video;
	}

	function get_single_record($video_id)
	{
		$this->db->where('video_id',$video_id);
		$query = $this->db->get_where('videos')->row_array();

		return $query;
	}

	function update_video($video_id,$form_array)
	{
		$this->db->where('video_id',$video_id);
		$update = $this->db->update('videos',$form_array);
		return $update;
	}

	function delete_video($video_id)
	{
		$this->db->where('video_id',$video_id);
		$delete = $this->db->delete('videos');
		return $delete;
	}
}
