<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colour extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Colour_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		$getAllColour = $this->Colour_model->getAllColour();
		$data['getAllColour'] = $getAllColour;
		$this->load->view('admin/manage-colour',$data);
	}


	public function create()
	{

		$config['upload_path']          = './public/uploads/color/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if (!is_dir($config['upload_path'])) {
					mkdir($config['upload_path'], 0777, TRUE);
				}

			if (!is_dir($config['upload_path']."thumb/")) {
					mkdir($config['upload_path']."thumb/", 0777, TRUE);
			}

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("color_title","Category Name","trim|required|is_unique[color.color_title]");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],16,16); 

					$form_array['image'] = $data['file_name'];

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/colour/create');
				}

			}

			$form_array['color_title'] = $this->input->post('color_title');
			$form_array['color_code'] = $this->input->post('color_code');
			$form_array['status'] = $this->input->post('status');
			$form_array['created_on'] = date('Y-m-d');

			$create = $this->Colour_model->create($form_array);

			if($create){

				$this->session->set_flashdata('success','Colour Inserted Successfully');
				redirect(base_url().'admin/colour/create');

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/colour/create');
			}
			

		}else{

			$this->load->view('admin/add-colour');
		}
	}

	public function edit($colour_id)
	{	
		$config['upload_path']          = './public/uploads/color/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if (!is_dir($config['upload_path'])) {
					mkdir($config['upload_path'], 0777, TRUE);
				}

			if (!is_dir($config['upload_path']."thumb/")) {
					mkdir($config['upload_path']."thumb/", 0777, TRUE);
			}

		$var = $this->Colour_model->get_single_record($colour_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Colour Not Found');
			redirect(base_url().'admin/colour/index');
		}


		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("color_title","Colour Title","trim|required");

		if($this->form_validation->run()==true){


			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],16,16); 

					$form_array['image'] = $data['file_name'];

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					rredirect(base_url().'admin/colour/edit/'.$colour_id);
				}

			}


			$form_array['color_title'] = $this->input->post('color_title');
			$form_array['color_code'] = $this->input->post('color_code');
			$form_array['status'] = $this->input->post('status');
			$form_array['modified_on'] = date('Y-m-d H:i:s');

			$create = $this->Colour_model->update_colour($colour_id,$form_array);

			if($create){

				$this->session->set_flashdata('success','Colour Updated Successfully');
				redirect(base_url().'admin/colour/edit/'.$colour_id);

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/colour/edit/'.$colour_id);
			}

		}else{

			$data['colour'] = $var;

			$this->load->view('admin/edit-colour',$data);
		}

	}

	public function delete($colour_id)
	{
		$var = $this->Colour_model->get_single_record($colour_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Colour Not Found');
			redirect(base_url().'admin/colour/index');
		}


		$delete = $this->Colour_model->delete_colour($colour_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/colour/index/');

		}else
		{
			$this->session->set_flashdata('error',"Colour Not Deleted");
			redirect(base_url().'admin/colour/index/');
		}

	}
}
