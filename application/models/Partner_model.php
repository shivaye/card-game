<?php  
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Partner_model extends CI_Model{ 
	function __construct() { 
		$this->tableName = 'files'; 
	} 

    /* 
     * Fetch files data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */ 

    function get_single_record($category_id)
    {
    	$this->db->where('id',$category_id);
    	$query = $this->db->get_where('files')->row_array();

    	return $query;
    }

    function update_caption($category_id,$form_array)
	{
		$this->db->where('id',$category_id);
		$update = $this->db->update('files',$form_array);
		return $update;
	}

    function delete_category($category_id)
    {
    	$this->db->where('id',$category_id);
    	$delete = $this->db->delete('files');
    	return $delete;
    }

    function delete($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('files');
    }

    public function getRows($id = ''){ 
    	$this->db->select('id,file_name,uploaded_on,caption'); 
    	$this->db->from('files'); 
    	if($id){ 

    		$this->db->where('id',$id); 
    		$query = $this->db->get(); 
    		$result = $query->row_array();

    	}else{ 

    		$this->db->order_by('uploaded_on','desc'); 
    		$query = $this->db->get(); 
    		$result = $query->result_array(); 
    	} 

    	return !empty($result)?$result:false; 
    } 

    /* 
     * Insert file data into the database 
     * @param array the data for inserting into the table 
     */ 
    public function insert($data = array()){ 
    	$insert = $this->db->insert('files', $data); 
    	return $insert?true:false; 
    } 
}