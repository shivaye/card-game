<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Banner_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		
		$allBanner = $this->Banner_model->getAllBannner();
		$data['allBanner'] = $allBanner;
		$this->load->view('admin/manage-banner',$data);
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

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image'] = $data['file_name'];

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/banner/create');
				}

			}


			$form_array['day_name'] = json_encode($this->input->post('day_name'));

			// if(!empty($this->input->post('btn_name')))
			// {

			// 	$form_array['is_days'] = 1;
			// }else{
			// 	$form_array['is_days'] = 0;
			// }

			// $form_array['btn_name'] = $this->input->post('btn_name');
			// $form_array['btn_link'] = $this->input->post('btn_link');
			$form_array['status'] = $this->input->post('status');
			$form_array['created_date'] = date('Y-m-d');

			$create = $this->Banner_model->create($form_array);

			if($create){

				$this->session->set_flashdata('success','Banner Inserted Successfully');
				redirect(base_url().'admin/banner/create');

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/banner/create');
			}


		}else{

			$this->load->view('admin/add-banner');
		}
	}

	public function edit($banner_id)
	{	
		$var = $this->Banner_model->get_single_record($banner_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Banner Not Found');
			redirect(base_url().'admin/banner/index');
		}

		$config['upload_path']          = './public/uploads/banner/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("status","Status","trim|required");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{

					if($var['image']!="" && file_exists('./public/uploads/banner/'.$var['image'])){
						unlink('./public/uploads/banner/'.$var['image']);
					}

					if($var['image']!="" && file_exists('./public/uploads/banner/thumb/'.$var['image'])){
						unlink('./public/uploads/banner/thumb/'.$var['image']);
					}


					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image'] = $data['file_name'];

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/banner/edit/'.$banner_id);
				}

			}

			$form_array['day_name'] = json_encode($this->input->post('day_name'));
			$form_array['status'] = $this->input->post('status');
			$form_array['created_date'] = date('Y-m-d');

			$create = $this->Banner_model->update_banner($banner_id,$form_array);

			if($create){

				$this->session->set_flashdata('success','Banner Updated Successfully');
				redirect(base_url().'admin/banner/edit/'.$banner_id);

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/banner/edit/'.$banner_id);
			}

		}else{

			$data['category'] = $var;

			$this->load->view('admin/edit-banner',$data);
		}

	}

	public function delete($banner_id)
	{
		$var = $this->Banner_model->get_single_record($banner_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Banner Not Found');
			redirect(base_url().'admin/banner/index');
		}

		if($var['image']!="" && file_exists('./public/uploads/banner/'.$var['image'])){
			unlink('./public/uploads/banner/'.$var['image']);
		}

		if($var['image']!="" && file_exists('./public/uploads/banner/thumb/'.$var['image'])){
			unlink('./public/uploads/banner/thumb/'.$var['image']);
		}

		$delete = $this->Banner_model->delete_banner($banner_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/banner/index/');

		}else
		{
			$this->session->set_flashdata('error',"Banner Not Deleted");
			redirect(base_url().'admin/banner/index/');
		}

	}
}
