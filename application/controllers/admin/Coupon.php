<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Coupon_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		
		$allBanner = $this->Coupon_model->getAllCoupon();
		$data['allBanner'] = $allBanner;
		$this->load->view('admin/manage-coupon',$data);
	}


	public function create()
	{

		$config['upload_path']          = './public/uploads/banner/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("status","Status","trim|required");

		if($this->form_validation->run()==true){


			$form_array['coupon_code'] = $this->input->post('coupon_code');
			$form_array['start_date'] = $this->input->post('start_date');
			$form_array['end_date'] = $this->input->post('end_date');
			$form_array['status'] = $this->input->post('status');
			$form_array['discount_type'] = $this->input->post('discount_type');

			if($this->input->post('discount_type')==1)
			{
				$form_array['percentage'] = $this->input->post('amount');
			}else{
				$form_array['flat_amount'] = $this->input->post('amount');
			}

			$create = $this->Coupon_model->create($form_array);

			if($create){

				$this->session->set_flashdata('success','Coupon Inserted Successfully');
				redirect(base_url().'admin/coupon/create');

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/coupon/create');
			}

		}else{

			$this->load->view('admin/add-coupon');
		}
	}

	public function edit($coupon_id)
	{	
		$var = $this->Coupon_model->get_single_record($coupon_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Coupon Not Found');
			redirect(base_url().'admin/coupon/index');
		}

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("status","Status","trim|required");

		if($this->form_validation->run()==true){


			$form_array['coupon_code'] = $this->input->post('coupon_code');
			$form_array['start_date'] = $this->input->post('start_date');
			$form_array['end_date'] = $this->input->post('end_date');
			$form_array['status'] = $this->input->post('status');
			$form_array['discount_type'] = $this->input->post('discount_type');

			if($this->input->post('discount_type')==1)
			{
				$form_array['percentage'] = $this->input->post('amount');
			}else{
				$form_array['flat_amount'] = $this->input->post('amount');
			}

			$create = $this->Coupon_model->update_coupon($coupon_id,$form_array);

			if($create){

				$this->session->set_flashdata('success','Coupon Updated Successfully');
				redirect(base_url().'admin/coupon/edit/'.$coupon_id);

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/coupon/edit/'.$coupon_id);
			}

		}else{

			$data['category'] = $var;

			$this->load->view('admin/edit-coupon',$data);
		}

	}

	public function delete($coupon_id)
	{
		$var = $this->Coupon_model->get_single_record($coupon_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Coupon Not Found');
			redirect(base_url().'admin/coupon/index');
		}

		if($var['image']!="" && file_exists('./public/uploads/banner/'.$var['image'])){
			unlink('./public/uploads/banner/'.$var['image']);
		}

		if($var['image']!="" && file_exists('./public/uploads/banner/thumb/'.$var['image'])){
			unlink('./public/uploads/banner/thumb/'.$var['image']);
		}

		$delete = $this->Coupon_model->delete_coupon($coupon_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/coupon/index/');

		}else
		{
			$this->session->set_flashdata('error',"Banner Not Deleted");
			redirect(base_url().'admin/coupon/index/');
		}

	}
}
