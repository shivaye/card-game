<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Size_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		$getAllSize = $this->Size_model->getAllSize();
		$data['getAllSize'] = $getAllSize;
		$this->load->view('admin/manage-size',$data);
	}


	public function create()
	{

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("size","Size","trim|required|is_unique[size.size]");

		if($this->form_validation->run()==true){


				$form_array['size'] = $this->input->post('size');
				$form_array['created_on'] = date('Y-m-d H:i:s');
				$form_array['modified_on'] = date('Y-m-d H:i:s');

				$create = $this->Size_model->create($form_array);

				if($create){

					$this->session->set_flashdata('success','Size Inserted Successfully');
					redirect(base_url().'admin/size/create');

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/size/create');
				}

		}else{
			$this->load->view('admin/add-size');
		}
	}

	public function edit($size_id)
	{	
		$var = $this->Size_model->get_single_record($size_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Size Not Found');
			redirect(base_url().'admin/size/index');
		}



		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("size","Size","trim|required");

		if($this->form_validation->run()==true){

				$form_array['size'] = $this->input->post('size');
				$form_array['created_on'] = date('Y-m-d H:i:s');
				$form_array['modified_on'] = date('Y-m-d H:i:s');

				$create = $this->Size_model->update_size($size_id,$form_array);

				if($create){

					$this->session->set_flashdata('success','Size Updated Successfully');
					redirect(base_url().'admin/size/edit/'.$size_id);

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/size/edit/'.$size_id);
				}
		
		}else{

			$data['category'] = $var;

			$this->load->view('admin/edit-size',$data);
		}

	}

	public function delete($size_id)
	{
		$var = $this->Size_model->get_single_record($size_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Size Not Found');
			redirect(base_url().'admin/size/index');
		}


		$delete = $this->Size_model->delete_size($size_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/size/index/');

		}else
		{
			$this->session->set_flashdata('error',"Category Not Deleted");
			redirect(base_url().'admin/size/index/');
		}

	}

}
