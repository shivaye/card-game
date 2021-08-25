<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Category_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		
		$allCategory = $this->Category_model->getAllCategory();
		$data['allCategory'] = $allCategory;
		$this->load->view('admin/manage-category',$data);
	}

	public function viewoffers()
	{
		
		$pakka_retailer_offer_details = $this->Category_model->pakka_retailer_offer_details();
		$data['pakka_retailer_offer_details'] = $pakka_retailer_offer_details;
		$data['allCategory'] = $this->Category_model->getAllCategory();
		$data['getpakka_top_coupon_category_offer'] = $this->Category_model->getpakka_top_coupon_category_offer();
		$this->load->view('admin/manage-viewoffers',$data);
	}

	public function create_coupon_category_offer()
	{		
			$form_array['top_coupon_cat_id'] = $this->input->post('top_coupon_cat_id');
			$url = $_SERVER['HTTP_REFERER'];
			$form_array['offer_id'] = $this->input->post('offer_id');
			$form_array['display_order'] = $this->input->post('display_order');
	        $form_array['is_active'] = $this->input->post('is_active');
			$form_array['create_date'] = date('Y-m-d H:i:s');
			$form_array['mofify_date'] = date('Y-m-d H:i:s');

			$insert = $this->Category_model->create_coupon_category_offer($form_array);

			if($insert)
			{
			
			$this->session->set_flashdata('success','Inserted Successfully');
			redirect($url);

			}else{

			$this->session->set_flashdata('msg','Something Went Wrong');
				redirect($url);
			}
	}

	public function create()
	{


		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("category_name","Category Name","trim|required");

		if($this->form_validation->run()==true){

			function clean($str)
			{
			  $cleanStr = preg_replace('/[^A-Za-z0-9 ]/', '', $str);	
			  $str_replace =str_replace(" ","",$cleanStr);
			 return strtolower($str_replace);
			}
			
			$form_array['category_name'] = $this->input->post('category_name');
			$form_array['div_id'] = clean($this->input->post('category_name'));
			$form_array['is_active'] = $this->input->post('is_active');
			$form_array['create_date'] = date('Y-m-d H:i:s');
			$form_array['mofify_date'] = date('Y-m-d H:i:s');

			$last_id = $this->Category_model->create($form_array);
			$form_array2['section_name'] = "Section".$last_id;
			$form_array2['display_order'] = $last_id;
			
			$create = $this->Category_model->update_category($last_id,$form_array2);

			if($create){

				$this->session->set_flashdata('success','Category Inserted Successfully');
				redirect(base_url().'admin/category/create');

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/category/create');
			}

		}else{
			$this->load->view('admin/add-category');
		}
	}

	public function edit($category_id)
	{	
		$var = $this->Category_model->get_single_record($category_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Category Not Found');
			redirect(base_url().'admin/category/index');
		}

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("category_name","Category Name","trim|required");
		// $this->form_validation->set_rules("meta_title","Meta Title","trim|required");

		if($this->form_validation->run()==true){


			function clean($str)
			{
			  $cleanStr = preg_replace('/[^A-Za-z0-9 ]/', '', $str);	
			  $str_replace =str_replace(" ","",$cleanStr);
			 return strtolower($str_replace);
			}
			
			$form_array['category_name'] = $this->input->post('category_name');
			$form_array['div_id'] = clean($this->input->post('category_name'));
			$form_array['is_active'] = $this->input->post('is_active');
			$form_array['mofify_date'] = date('Y-m-d H:i:s');
			$form_array['section_name'] = "Section".$category_id;

			$create = $this->Category_model->update_category($category_id,$form_array);

			if($create){

				$this->session->set_flashdata('success','Category Updated Successfully');
				redirect(base_url().'admin/category/edit/'.$category_id);

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/category/edit/'.$category_id);
			}

		}else{

			$data['category'] = $var;

			$this->load->view('admin/edit-category',$data);
		}

	}

	public function delete($category_id)
	{
		$var = $this->Category_model->get_single_record($category_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Category Not Found');
			redirect(base_url().'admin/category/index');
		}

		$delete = $this->Category_model->delete_category($category_id);
		$delete = $this->Category_model->delete_offer_category($category_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/category/index/');

		}else
		{
			$this->session->set_flashdata('error',"Category Not Deleted");
			redirect(base_url().'admin/category/index/');
		}

	}

	public function delete_offer($id)
	{
	  $delete = $this->Category_model->delete_pakka_top_coupon_category_offer($id);
	  $url = $_SERVER['HTTP_REFERER'];
	  if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect($url);

		}else
		{
			$this->session->set_flashdata('error',"Category Not Deleted");
			redirect($url);
		}
	}

	public function sortable()
	{
		$position = @$_REQUEST['position'];
		$i=1;
		foreach($position as $k=>$v){
			$form_array['display_order'] = $i;
			$this->Category_model->update_category($v,$form_array);
			$i++;
		}
	}
}
