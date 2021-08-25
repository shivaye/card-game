<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_model extends CI_Model {

	public function get_categories()
	{

   $this->db->select('*');
   $this->db->from('category');
   $this->db->where('status', 1);
   $this->db->order_by("position", "asc");
   $parent = $this->db->get();

   $categories = $parent->result();
   $i=0;

   foreach($categories as $p_cat){
    $category_name[$i] = $p_cat->category_name;
    $categories[$i] = $this->sub_categories($p_cat->category_id);
    $i++;
  }

  return array("categories"=>$categories,"category_name"=>$category_name);
}


public function fetch_data_home()
{
 $this->db->select('*');
 $this->db->from('home_offer_products');
 $this->db->where('status', 1);
 $this->db->order_by("position", "asc");
 $parent = $this->db->get();
 $fetch_data_home = $parent->result(); 

 $output = "";
 $product_name = "";
 foreach($fetch_data_home as $data_home){

  $product_ids = explode(",",$data_home->product_ids);


  foreach ($product_ids as $product){
   $product_name .='<div class="product_listing">
   <a href="#">
   <img src="http://localhost/lenskart1/public/uploads/products/279/LWF_141-BLACK_GLOSSY_(2)k.jpg" title=""/>
   </a>
   <div class="product_details">
   <div class="product_name">
   <a href="#">SHIVAM</a>
   </div>
   <div class="product_details">
   <div class="pro_price_con">
   <div class="product_desc">
   ₹How Much 
   </div>
   <div class="pro_reg_price">
   ₹ Very much
   </div>
   <div class="pro_offer_price">
   No discount % off  
   </div>
   </div>
   </div>
   </div>
   </div>';
 }

 $output.= '<div class="py-10 bg-wht">
 <div class="container">
 <div class="row">
 <div class="col-md-6 col-xs-8">
 <div class="shop-text" data-id="1"><h4>'.$data_home->display_name.'</h4></div>
 </div>
 <div class="col-md-6 text-right col-xs-4">
 <div class="view_all_button" data-id="2" >
 <a href="'.base_url().'welcome/products/'.$data_home->category_id.'/'.$data_home->subcategory_id.'">View all</a>
 </div>
 </div>
 </div>
 </div>
 </div>

 <div class="product_grid_view">
 <div class="container">
 <div class="row">
 <div class="col-md-12 py-30">
 <div data-id="3">
 <div class="owl-demo owl-carousel owl-theme" style="opacity: 1; display: block;">
 '.$product_name.'
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>

 ';
}

return $output;

}

public function getAllOffersImages($caption)
{
  $this->db->where('caption', $caption);
  return $this->db->select('*')
  ->from('files')
  ->get()->result_array();
}

public function getAllVarients($product_id)
{
 $this->db->where('product_id', $product_id);
 return $color_varient = $this->db->select('*')
 ->from('product_colour')
 ->join('color','color.id = product_colour.colour_id')
 ->get()->result_array();
}

public function UserPowerDetails($user_id)
{
  $this->db->where('user_id', $user_id);
  return $this->db->select('*')
  ->from('user_power')
  ->get()->result_array();
}

public function UserPowerTickets($user_id)
{   
  $this->db->order_by('status',"desc");
  $this->db->where('user_id', $user_id);
  return $this->db->select('*')
  ->from('tickets')
  ->get()->result_array();
}

public function ticket_chats($user_id,$ticket_id)
{

 $this->db->order_by('chat_id',"asc");
 $this->db->where('ticket_id', $ticket_id);
 return  $this->db->select('*')
 ->from('ticket_chat')
 ->get()->result_array();
}

function getUserAddrress($user_id)
{
  $this->db->where('user_id', $user_id);
  $this->db->order_by('full_name', 'ASC');
  $query = $this->db->get('user_address1');
  $output = '<option id="address-select">Choose Your Shipping Address</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->full_name.','.$row->address1.','.$row->address2.','.$row->city.','.$row->state.','.$row->zip.','.$row->country.'</option>';
 }
 return $output;
}

public function getUserAddrressbyId($address_id)
{
 $this->db->select('*');
 $this->db->from('user_address1');
 $this->db->where('id',$address_id);
 return $this->db->get()->row_array();
}

public function create_newsletter($form_array)
{
  $insert = $this->db->insert('newsletter',$form_array);
  return $insert;
}

public function call_me($form_array)
{
  $insert = $this->db->insert('call_me',$form_array);
  return $insert;
}

public function getActiveBrands()
{
 $this->db->select('*');
 $this->db->from('brands');
 $this->db->where('status', 1);
 return $this->db->get()->result_array();

}

public function getAllCategoryBrands($category_id)
{
  $this->db->distinct();
  $this->db->select('brand_id');
  $this->db->from('product');
  $this->db->where('category_id',$category_id);
  return $this->db->get()->result_array();
}

public function getAllBanner()
{
 $this->db->select('*');
 $this->db->from('banner');
 $this->db->where('status',1);
 return $this->db->get()->result_array();
}

public function sub_categories($id)
{
  $this->db->select('*');
  $this->db->from('subcategory');
  $this->db->where('category_id', $id);
  // $this->db->where('is_shop !=',1);
  $this->db->where('header',1);
  $this->db->order_by("subposition", "asc");
  $child = $this->db->get();
  $categories = $child->result();
  $i=0;
  return $categories;  

}

function fetch_filter_type($type)
{
  $this->db->distinct();
  $this->db->select($type);
  $this->db->from('product');
  $this->db->where('status', '1');
  return $this->db->get();
}

function make_query($minimum_price,$maximum_price,$minimum_price1,$maximum_price1,$minimum_price2,$maximum_price2,$minimum_price3,$maximum_price3,$minimum_price4,$maximum_price4,$category_id,$subcategory_id,$brand_id,$frame_shape,$style,$material,$disposability,$lenstype,$solution,$size)
{

  $this->db->where('collections', $subcategory_id);
  $query1 = $this->db->get('product_varient_collection_table');

  $pro_array= array();
  foreach($query1->result() as $row)
  {
    $pro_array[] = $row->product_id;
  }

  if(empty(isset($brand_id)))
  {
    $brand_query = " and category_id='".$category_id."' and subcategory_id='".$subcategory_id."' ";
  }

// if(empty(isset($brand_id)))
// {
//   if(!empty($pro_array))
//   {
//     @$query.= " or p.product_id IN (".implode(',', $pro_array).")";
//   }
// }

  if(!empty($pro_array))
  {

    @$query = "
    SELECT p.* FROM product as p 
    WHERE p.product_id IN (".implode(',', $pro_array).") and p.status=1
    ";

  }else{

    @$query = "
    SELECT p.* FROM product as p WHERE p.status = '1' $brand_query  
    ";

  }


  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
    @$query .= "
    AND price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
    ";
  }


  if(isset($minimum_price1, $maximum_price1) && !empty($minimum_price1) &&  !empty($maximum_price1))
  {

    $select_arms = ("select distinct product_id from `product_arm_table` where arm_ids BETWEEN '".$minimum_price1."' and  '".$maximum_price1."' ");  

    @$query .= "
    and p.product_id IN(".$select_arms.")
    ";
  }

  if(isset($minimum_price2, $maximum_price2) && !empty($minimum_price2) &&  !empty($maximum_price2))
  {
    $select_lens_dia = ("select distinct product_id from `product_lens_diameter_table` where dia_ids BETWEEN '".$minimum_price2."' and  '".$maximum_price2."' ");  

    @$query .= "
    and p.product_id IN(".$select_lens_dia.")
    ";
  }

  if(isset($minimum_price3, $maximum_price3) && !empty($minimum_price3) &&  !empty($maximum_price3))
  {
    $select_nose = ("select distinct product_id from `product_nosebridge_table` where nose_ids BETWEEN '".$minimum_price3."' and  '".$maximum_price3."' ");  

    $query .= "
    and p.product_id IN(".$select_nose.")
    ";
  }

  if(isset($minimum_price4, $maximum_price4) && !empty($minimum_price4) &&  !empty($maximum_price4))
  {
    $select_framewidth = ("select distinct product_id from `product_range_table` where range_ids BETWEEN '".$minimum_price4."' and  '".$maximum_price4."' ");  

    $query .= "
    and p.product_id IN(".$select_framewidth.")
    ";
  }

  if(isset($frame_shape))
  {
    $select_frameshape = ("select distinct product_id from `product_frame_shape_table` where frame_ids in (".implode(",",$frame_shape).") ");  

    @$query .= "
    and p.product_id IN(".$select_frameshape.")
    ";
  }

  if(isset($disposability))
  {

    $imp = "'" . implode( "','", $disposability) . "'";

    $disp = ("select distinct product_id from `product_disposability` where disposal_name in ($imp) ");  

    @$query .= "
    and p.product_id IN(".$disp.")
    ";
  }

  if(isset($lenstype))
  {
    $imp = "'" . implode( "','", $lenstype) . "'";

    $lenses_type = ("select distinct product_id from `lens_type_name` where lens_type_name in ($imp) ");  

    @$query .= "
    and p.product_id IN(".$lenses_type.")
    ";
  }

  if(isset($solution))
  {
    $imp = "'" . implode( "','", $solution) . "'";
    $solution_name = ("select distinct product_id from `product_solutions` where solution_name in ($imp) ");  

    @$query .= "
    and p.product_id IN(".$solution_name.")
    ";
  }

  if(isset($style))
  {
    $select_style = ("select distinct product_id from `product_style` where style in (".implode(",",$style).") ");  

    @$query .= "
    and p.product_id IN(".$select_style.")
    ";
  }

  if(isset($material))
  {
    $select_material = ("select distinct product_id from `product_material` where materials in (".implode(",",$material).") ");  

    @$query .= "
    and p.product_id IN(".$select_material.")
    ";
  }

  if(isset($size))
  {
    $select_material = ("select distinct product_id from `product_size_table` where size in (".implode(",",$size).") ");  

    @$query .= "
    and p.product_id IN(".$select_material.")
    ";
  }

  if(isset($brand_id))
  {
    @$query .= "
    and p.brand_id IN(".implode(",",$brand_id).")
    ";
  }

  $query.=" GROUP BY  p.`product_id`";

  $query.=" ORDER BY `p`.`position_order` ASC ";

  return $query;
}

function count_all($minimum_price,$maximum_price,$minimum_price1,$maximum_price1,$minimum_price2,$maximum_price2,$minimum_price3,$maximum_price3,$minimum_price4,$maximum_price4,$category_id,$subcategory_id,$brand_id,$frame_shape,$style,$material,$disposability,$lenstype,$solution,$size)
{
  $query = $this->make_query($minimum_price,$maximum_price,$minimum_price1,$maximum_price1,$minimum_price2,$maximum_price2,$minimum_price3,$maximum_price3,$minimum_price4,$maximum_price4,$category_id,$subcategory_id,$brand_id,$frame_shape,$style,$material,$disposability,$lenstype,$solution,$size);
  $data = $this->db->query($query);
  return $data->num_rows();
}

function fetch_data($limit,$start,$minimum_price,$maximum_price,$minimum_price1,$maximum_price1,$minimum_price2,$maximum_price2,$minimum_price3,$maximum_price3,$minimum_price4,$maximum_price4,$category_id,$subcategory_id,$brand_id,$frame_shape,$style,$material,$disposability,$lenstype,$solution,$size,$category_slug,$subcategory_slug)
{
  $query = $this->make_query($minimum_price,$maximum_price,$minimum_price1,$maximum_price1,$minimum_price2,$maximum_price2,$minimum_price3,$maximum_price3,$minimum_price4,$maximum_price4,$category_id,$subcategory_id,$brand_id,$frame_shape,$style,$material,$disposability,$lenstype,$solution,$size);

  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {

    $off = "";

    foreach($data->result_array() as $row)
    {
      if(!empty($row['mrp']))
      {
        $discount = $row['mrp']-$row['price'];

        $off =  ($discount*100)/$row['mrp']; 
      }


      $url = base_url()."product/".$category_slug."/".$subcategory_slug."/".$row['product_slug'];

      $this->db->where('product_id', $row['product_id']);
      $color_varient = $this->db->select('*')
      ->from('product_colour')
      ->join('color','color.id = product_colour.colour_id')
      ->get()->result_array();

      $this->db->where('product_id', $row['product_id']);
      $getimage = $this->db->select('*')
      ->from('product_images')
      ->order_by('image_postion','asc')
      ->limit(1)
      ->get()->row_array();

      $image_url = base_url().'/public/uploads/products/'.@$row['product_id'].'/'.@$getimage['product_image'];

      $varients = "";
      $i=1;
      foreach($color_varient as $color_varient_row){

        $url_varient = base_url()."product/".$category_slug."/".$subcategory_slug."/".$row['product_slug']."/".$color_varient_row['product_colour_id'];

        if($color_varient_row['image']!="")
        {

          $image_url2 = base_url().'public/uploads/color/'.$color_varient_row['image'];

          $varients.='<a href="'.$url_varient.'" onmouseover="show_varient_image('.$color_varient_row['product_colour_id'].','.$color_varient_row['product_id'].')" onmouseout="normalImg('.$color_varient_row['product_colour_id'].','.$color_varient_row['product_id'].')" target="_blank" style="float:right; border-radius: 25px; background:none; padding:2px 2px;">
          <img  src="'.$image_url2.'" alt="'.$color_varient_row['color_title'].'" class="img-fluid rounded-circle" style=" height:20px; width:20px; float:right; border-radius: 25px;"/>
          </a>';

        }else{
          $varients.='<a href="'.$url_varient.'" style="background-color:'.$color_varient_row['color_code'].'; height:20px; width:20px; float:right; border-radius: 25px; margin:2px;" onmouseover="show_varient_image('.$color_varient_row['product_colour_id'].','.$color_varient_row['product_id'].')" onmouseout="normalImg('.$color_varient_row['product_colour_id'].','.$color_varient_row['product_id'].')" target="_blank"></a>';
        }

        
        $i++;
      }

      $varient_section= "<div class='pro_review'>
      ".$varients."
      </div>";
      
      $output .= '
      <li class="col-md-4 col-sm-4 col-xs-12 mb-20">
      <div class="product_img ">
      <div class="product_hide">
      <div class="fav-btn1">                             

      <input type="hidden"  class="image1'.$row['product_id'].'" value="'.$image_url.'">
      </div>
      </div>
      <div class="product_listing">
      <a href="'.$url.'" target="_blank">
      <div class="img-box">
      <img  src="'.$image_url.'" alt="'.$row['product_name'].'" class="image'.$row['product_id'].'" /></div>
      </a>
      </div>
      </div>
      <div class="pro-name">
      <a href="'.$url.'" target="_blank" >'.$row['product_name'].'</a>
      '.$varient_section.'
      </div>
      <div class="pro_price_con search_product_price">
      <div class="offer_prize">
      ₹'.$row['price'].'  
      </div>
      <div class="pro_reg_price">
      ₹'.$row['mrp'].' 
      </div>
      <div class="pro_offer_price">
      '.ceil($off).'% off  
      </div>
      </div>
      </li>';
    }
  }else{
    $output = '<h3>No Data Found</h3>';
  }
  return $output;
}

public function getAllHomeCategory()
{ 
  $this->db->where('status',1);
  $return_category = $this->db->get('category')->result_array();
  return $return_category;
}

public function getAllHomeSubCategory()
{ 
  $this->db->where('is_shop',1);
  $return_category = $this->db->get('subcategory')->result_array();
  return $return_category;
}

public function get_product_detail($product_slug)
{
  $this->db->where('product_slug',$product_slug);
  $this->db->join('brands', 'brands.brand_id = product.brand_id');
  $query = $this->db->get_where('product')->row_array();
  return $query;
}

public function get_product_detail_id($product_id)
{
  $this->db->where('product_id',$product_id);
  $query = $this->db->get_where('product')->row_array();
  return $query;
}

public function getAllMensEyeglass($category_id,$subcategory_id)
{ 
  $this->db->where('category_id',$category_id);
  $this->db->where('subcategory_id',$subcategory_id);
  $this->db->where('product.status',1);
  $return_menscategory = $this->db->select('*')
  ->from('product')
  ->join('product_images','product_images.product_id = product.product_id')
  ->limit(6)
  ->group_by('product.product_id')
  ->get()->result_array();
  return $return_menscategory;
}

public function getAllsearch($keywords)
{ 
  $this->db->like('product_name',$keywords,"both",false);

  $return_search = $this->db->select('product.*,subcategory.subcategory_slug,category.category_slug')
  ->from('product')
  ->join('product_images','product_images.product_id = product.product_id')
  ->join('category','category.category_id = product.category_id',"left")
  ->join('subcategory','subcategory.subcategory_id = product.subcategory_id',"left")
  ->group_by('product.product_id')
  ->get()->result_array();
  return $return_search;
}

public function getAllImages($table,$product_id,$varient_id="")
{
  if(!empty($varient_id))
  {
    $this->db->where('varient_id',$varient_id);
    $this->db->order_by("v_position", "asc");
  }

  $this->db->where('product_id',$product_id);
  $return_Images = $this->db->select('*')
  ->from($table)
  ->get()->result_array();
  return $return_Images;
}

public function getAllReview($product_id)
{
  $this->db->where('product_id',$product_id);
  $this->db->where('status',1);

  $return_reviews = $this->db->select('*')
  ->from('product_reviews')
  ->get()->result_array();
  return $return_reviews;
}

public function getAllRelatedProducts($category_id,$subcategory_id)
{ 
  $this->db->where('category_id',$category_id);
  $this->db->where('subcategory_id',$subcategory_id);

  $return_relatedProducts = $this->db->select('*')
  ->from('product')
  ->join('product_images','product_images.product_id = product.product_id')
  ->limit(6)
  ->group_by('product.product_id')
  ->get()->result_array();
  return $return_relatedProducts;
}

public function get_varient_single_image($product_id,$product_varient_id)
{
  $this->db->limit(1);
  $this->db->order_by('v_position','asc');
  return $query = $this->db->get_where('product_varient_image_table', array('product_id' => $product_id,'varient_id' => $product_varient_id),1)->row();
}

public function show_power_lenses($power_id)
{
  $this->db->where('power_id', $power_id);
  $query = $this->db->get('powerlenses');

  $output="";
  foreach($query->result() as $row)
  {
    if($row->image!="" && file_exists('./public/uploads/powerlense/thumb/'.$row->image))
    {
      $image_url = base_url().'public/uploads/powerlense/thumb/'.$row->image;
    }else{
      $image_url = base_url().'public/front/images/lens-icon.jpg';
    }

    $output1 = "";
    $feat = explode("@#",$row->features);

    foreach ($feat as $featuresss) {
      $output1 .='<li class="list-group-item"><i class="icon-ok text-danger"></i>'.$featuresss.'</li>';
    }

    $output .= '<div class="swiper-slide">
    <div class="product_listing">
    <div class="panel panel-danger">
    <div class="panel-heading">
    <div class="lens-icon">
    <img src="'.$image_url.'">
    </div>
    <h4 class="text-center">
    '.ucfirst($row->title).'
    </h4>
    </div>
    <div class="panel-body text-center">
    <p class="lead">
    <strong>₹ 1500</strong>
    </p>
    </div>
    <ul class="list-group list-group-flush text-center">
    '.$output1.'
    </ul>
    <div class="panel-footer">
    <a class="btn btn-lg btn-block btn-danger cart-button" href="javascript:void(0);" onclick="ajax_add_cart('.$row->lenses_id.','.$row->amount.')" style="width:200px;">Add To Cart</a>
    </div>
    </div>
    </div>
    </div>';
  }

  return $output;
}

function say_images($product_id)
{
  
$this->db->where('product_id',$product_id);
$this->db->order_by('image_postion',"asc");
$this->db->limit(1);
  $query = $this->db->get_where('product_images')->row_array();
  return $query;
}

}
