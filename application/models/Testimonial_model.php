<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

	public function create($form_array)
	{
		$insert = $this->db->insert('testimonial',$form_array);
		return $insert;
		
	}

	public function getAllTestimonial()
	{
		$return_testimonial = $this->db->get('testimonial')->result_array();
		return $return_testimonial;
	}

	function get_single_record($testimonial_id)
	{
		$this->db->where('testimonial_id',$testimonial_id);
		$query = $this->db->get_where('testimonial')->row_array();

		return $query;
	}

	function update_testimonial($testimonial_id,$form_array)
	{
		$this->db->where('testimonial_id',$testimonial_id);
		$update = $this->db->update('testimonial',$form_array);
		return $update;
	}

	function delete_testimonial($testimonial_id)
	{
		$this->db->where('testimonial_id',$testimonial_id);
		$delete = $this->db->delete('testimonial');
		return $delete;
	}
}
