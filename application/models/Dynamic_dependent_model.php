<?php
class Dynamic_dependent_model extends CI_Model
{

 function fetch_country()
 {
  $this->db->order_by("name", "ASC");
  $query = $this->db->get("country");
  return $query->result();
 }

 function fetch_state($country_id)
 {
  $this->db->where('country_id', $country_id);
  $this->db->order_by('state_name', 'ASC');
  $query = $this->db->get('state');
  $output = '<option value="">Select State</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->category_id.'">'.$row->state_name.'</option>';
  }
  return $output;
 }

 function fetch_subcategory($category_id,$selected_val)
 {
  
  $this->db->where('category_id', $category_id);
  $this->db->order_by('subcategory_name', 'ASC');
  $query = $this->db->get('subcategory');
  $output = '<option value="">Select Subcategory</option>';
  foreach($query->result() as $row)
  {
    if($selected_val==$row->subcategory_id){
      
      $selected = "selected";
    }else{
      $selected = "";
    }
   $output .= '<option value="'.$row->subcategory_id.'" '.$selected.'>'.$row->subcategory_name.'</option>';
  }
  return $output;
 }
 
}

?>
