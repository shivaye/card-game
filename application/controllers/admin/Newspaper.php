<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newspaper extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Newspaper_model');
		$this->load->model('dynamic_dependent_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		
		$allnewspaper = $this->Newspaper_model->getAllnewspaper();
		$data['allnewspaper'] = $allnewspaper;
		$this->load->view('admin/manage-newspaper',$data);
	}


	public function create()
	{

		$config['upload_path']          = './public/uploads/newspaper/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("newspaper_name","Category Name","trim|required");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image'] = $data['file_name'];
					$form_array['state_id'] = $this->input->post('state_id');
					$form_array['city_id'] = $this->input->post('city_id');
					$form_array['newspaper_name'] = $this->input->post('newspaper_name');
					$form_array['language'] = $this->input->post('language');
					$form_array['newspaper_name'] = $this->input->post('newspaper_name');
					$form_array['status'] = $this->input->post('status');
					$form_array['created_date'] = date('Y-m-d');

					$create = $this->Newspaper_model->create($form_array);

					if($create){

						$this->session->set_flashdata('success','Newspaper Inserted Successfully');
						redirect(base_url().'admin/newspaper/create');

					}else{

						$this->session->set_flashdata('msg','Something Went Wrong');
						redirect(base_url().'admin/newspaper/create');
					}

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/newspaper/create');
				}

			}else{

				$form_array['state_id'] = $this->input->post('state_id');
				$form_array['city_id'] = $this->input->post('city_id');
				$form_array['newspaper_name'] = $this->input->post('newspaper_name');
				$form_array['language'] = $this->input->post('language');
				$form_array['newspaper_name'] = $this->input->post('newspaper_name');
				$form_array['status'] = $this->input->post('status');
				$form_array['created_date'] = date('Y-m-d');

				$create = $this->Newspaper_model->create($form_array);

				if($create){

					$this->session->set_flashdata('success','Newspaper Inserted Successfully');
					redirect(base_url().'admin/newspaper/create');

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/newspaper/create');
				}
			}

		}else{

			$getAllstates = $this->Newspaper_model->getAllstates('101');
			$data['states'] = $getAllstates;
			$this->load->view('admin/create-newspaper',$data);
		}
	}

	function fetch_city()
	{
		if($this->input->post('state_id'))
		{
			echo $this->dynamic_dependent_model->fetch_city($this->input->post('state_id'),$this->input->post('selected_val'));
		}
	}

	public function edit($newspaper_id)
	{	
		$var = $this->Newspaper_model->get_single_record($newspaper_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Newspaper Not Found');
			redirect(base_url().'admin/newspaper/index');
		}

		$config['upload_path']          = './public/uploads/newspaper/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("newspaper_name","Newspaper Name","trim|required");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{

					if($var['image']!="" && file_exists('./public/uploads/newspaper/'.$var['image'])){
						unlink('./public/uploads/newspaper/'.$var['image']);
					}

					if($var['image']!="" && file_exists('./public/uploads/newspaper/thumb/'.$var['image'])){
						unlink('./public/uploads/newspaper/thumb/'.$var['image']);
					}


					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image'] = $data['file_name'];
					$form_array['state_id'] = $this->input->post('state_id');
					$form_array['city_id'] = $this->input->post('city_id');
					$form_array['newspaper_name'] = $this->input->post('newspaper_name');
					$form_array['language'] = $this->input->post('language');
					$form_array['newspaper_name'] = $this->input->post('newspaper_name');
					$form_array['status'] = $this->input->post('status');
					$form_array['created_date'] = date('Y-m-d');

					$create = $this->Newspaper_model->update_newspaper($newspaper_id,$form_array);

					if($create){

						$this->session->set_flashdata('success','Category Updated Successfully');
						redirect(base_url().'admin/newspaper/edit/'.$newspaper_id);

					}else{

						$this->session->set_flashdata('msg','Something Went Wrong');
						redirect(base_url().'admin/newspaper/edit/'.$newspaper_id);
					}

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/newspaper/edit/'.$newspaper_id);
				}

			}else{

					$form_array['state_id'] = $this->input->post('state_id');
					$form_array['city_id'] = $this->input->post('city_id');
					$form_array['newspaper_name'] = $this->input->post('newspaper_name');
					$form_array['language'] = $this->input->post('language');
					$form_array['newspaper_name'] = $this->input->post('newspaper_name');
					$form_array['status'] = $this->input->post('status');
					$form_array['created_date'] = date('Y-m-d');

				$create = $this->Newspaper_model->update_newspaper($newspaper_id,$form_array);

				if($create){

					$this->session->set_flashdata('success','Category Updated Successfully');
					redirect(base_url().'admin/newspaper/edit/'.$newspaper_id);

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/newspaper/edit/'.$newspaper_id);
				}
			}

		}else{

			$getAllstates = $this->Newspaper_model->getAllstates('101');
			$data['states'] = $getAllstates;
			$data['newspaper'] = $var;
			$this->load->view('admin/edit-newspaper',$data);
		}

	}

	public function delete($newspaper_id)
	{
		$var = $this->Newspaper_model->get_single_record($newspaper_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Newspaper Not Found');
			redirect(base_url().'admin/newspaper/index');
		}

		if($var['image']!="" && file_exists('./public/uploads/newspaper/'.$var['image'])){
			unlink('./public/uploads/newspaper/'.$var['image']);
		}

		if($var['image']!="" && file_exists('./public/uploads/newspaper/thumb/'.$var['image'])){
			unlink('./public/uploads/newspaper/thumb/'.$var['image']);
		}

		$delete = $this->Newspaper_model->delete_newspaper($newspaper_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/newspaper/index/');

		}else
		{
			$this->session->set_flashdata('error',"Newspaper Not Deleted");
			redirect(base_url().'admin/newspaper/index/');
		}

	}
}
