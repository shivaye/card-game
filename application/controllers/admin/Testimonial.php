<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Testimonial_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		
		$alltesTimonial = $this->Testimonial_model->getAlltesTimonial();
		$data['alltesTimonial'] = $alltesTimonial;
		$this->load->view('admin/manage-testimonial',$data);
	}


	public function create()
	{

		$config['upload_path']          = './public/uploads/testimonial/';
		$config['upload_path1']          = './public/uploads/testimonial/thumb';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;


		if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}
			if (!is_dir($config['upload_path1'])) {
				mkdir($config['upload_path1'], 0777, TRUE);
			}

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
					redirect(base_url().'admin/testimonial/create');
				}

			}

					$form_array['name'] = $this->input->post('name');
					$form_array['content'] = $this->input->post('content');
					$form_array['status'] = $this->input->post('status');
					$form_array['created_date'] = date('Y-m-d');

				$create = $this->Testimonial_model->create($form_array);

				if($create){

					$this->session->set_flashdata('success','Testimonial Inserted Successfully');
					redirect(base_url().'admin/testimonial/create');

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/testimonial/create');
				}
	

		}else{

			$this->load->view('admin/add-testimonial');
		}
	}

	public function edit($testimonial_id)
	{	
		$var = $this->Testimonial_model->get_single_record($testimonial_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','testimonial Not Found');
			redirect(base_url().'admin/testimonial/index');
		}

		$config['upload_path']          = './public/uploads/testimonial/';
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

					if($var['image']!="" && file_exists('./public/uploads/testimonial/'.$var['image'])){
						unlink('./public/uploads/testimonial/'.$var['image']);
					}

					if($var['image']!="" && file_exists('./public/uploads/testimonial/thumb/'.$var['image'])){
						unlink('./public/uploads/testimonial/thumb/'.$var['image']);
					}


					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image'] = $data['file_name'];

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/testimonial/edit/'.$testimonial_id);
				}

			}

					$form_array['name'] = $this->input->post('name');
					$form_array['content'] = $this->input->post('content');
					$form_array['status'] = $this->input->post('status');
					$form_array['created_date'] = date('Y-m-d');

				$create = $this->Testimonial_model->update_testimonial($testimonial_id,$form_array);

				if($create){

					$this->session->set_flashdata('success','Testimonial Updated Successfully');
					redirect(base_url().'admin/testimonial/edit/'.$testimonial_id);

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/testimonial/edit/'.$testimonial_id);
				}

		}else{

			$data['testimonial'] = $var;

			$this->load->view('admin/edit-testimonial',$data);
		}

	}

	public function delete($testimonial_id)
	{
		$var = $this->Testimonial_model->get_single_record($testimonial_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Testimonial Not Found');
			redirect(base_url().'admin/testimonial/index');
		}

		if($var['image']!="" && file_exists('./public/uploads/testimonial/'.$var['image'])){
			unlink('./public/uploads/testimonial/'.$var['image']);
		}

		if($var['image']!="" && file_exists('./public/uploads/testimonial/thumb/'.$var['image'])){
			unlink('./public/uploads/testimonial/thumb/'.$var['image']);
		}

		$delete = $this->Testimonial_model->delete_testimonial($testimonial_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/testimonial/index/');

		}else
		{
			$this->session->set_flashdata('error',"Testimonial Not Deleted");
			redirect(base_url().'admin/testimonial/index/');
		}

	}
}
