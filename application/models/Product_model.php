<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	function __construct(){

    parent::__construct();//Call the model constructor
  }

  public function create($form_array)
  {
  	$insert = $this->db->insert('deal',$form_array);
  	return $this->db->insert_id();
  }

  public function getAllProduct()
  {
    $query = $this->db->get_where('deal')->result_array();
    return $query;
  }


  public function get_single_record($product_id)
  {
  	$this->db->where('id',$product_id);
  	$query = $this->db->get_where('deal')->row_array();
  	return $query;
  }

    public function update_product($product_id,$form_array)
  {
    $this->db->where('id',$product_id);
    $update = $this->db->update('deal',$form_array);
    return $update;
  }


  public function delete_product($product_id)
  {
  	$this->db->where('id',$product_id);
  	$delete = $this->db->delete('deal');
  	return $delete;
  }


}
