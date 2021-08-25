<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Brand_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		$getAllBrands = $this->Brand_model->getAllBrands();
		$data['getAllBrands'] = $getAllBrands;
		$this->load->view('admin/manage-brand',$data);
	}


	public function create()
	{

		$config['upload_path']          = './public/uploads/brands/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("brand_name","Category Name","trim|required");
		$this->form_validation->set_rules("meta_title","Meta Title","trim|required");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image'] = $data['file_name'];
					$form_array['brand_name'] = $this->input->post('brand_name');

					$slug = url_title($this->input->post('brand_name'), 'dash', true);

					$form_array['brand_slug'] = $slug;
					$form_array['meta_title'] = $this->input->post('meta_title');
					$form_array['meta_description'] = $this->input->post('meta_description');
					$form_array['status'] = $this->input->post('status');
					$form_array['created_date'] = date('Y-m-d');

					$create = $this->Brand_model->create($form_array);

					if($create){

						$this->session->set_flashdata('success','Brands Inserted Successfully');
						redirect(base_url().'admin/brands/create');

					}else{

						$this->session->set_flashdata('msg','Something Went Wrong');
						redirect(base_url().'admin/brands/create');
					}

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/brands/create');
				}

			}else{

				$form_array['brand_name'] = $this->input->post('brand_name');
				$slug = url_title($this->input->post('brand_name'), 'dash', true);
				$form_array['brand_slug'] = $slug;
				$form_array['meta_title'] = $this->input->post('meta_title');
				$form_array['meta_description'] = $this->input->post('meta_description');
				$form_array['status'] = $this->input->post('status');
				$form_array['created_date'] = date('Y-m-d');

				$create = $this->Brand_model->create($form_array);

				if($create){

					$this->session->set_flashdata('success','Brands Inserted Successfully');
					redirect(base_url().'admin/brands/create');

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/brands/create');
				}
			}

		}else{

			$this->load->view('admin/add-brand');
		}
	}

	public function edit($brand_id)
	{	
		$var = $this->Brand_model->get_single_record($brand_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Brands Not Found');
			redirect(base_url().'admin/brands/index');
		}

		$config['upload_path']          = './public/uploads/brands/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("brand_name","Category Name","trim|required");
		$this->form_validation->set_rules("meta_title","Meta Title","trim|required");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{

					if($var['image']!="" && file_exists('./public/uploads/brands/'.$var['image'])){
						unlink('./public/uploads/brands/'.$var['image']);
					}

					if($var['image']!="" && file_exists('./public/uploads/brands/thumb/'.$var['image'])){
						unlink('./public/uploads/brands/thumb/'.$var['image']);
					}


					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image'] = $data['file_name'];
					$form_array['brand_name'] = $this->input->post('brand_name');
					$slug = url_title($this->input->post('brand_name'), 'dash', true);
					$form_array['brand_slug'] = $slug;
					$form_array['meta_title'] = $this->input->post('meta_title');
					$form_array['meta_description'] = $this->input->post('meta_description');
					$form_array['status'] = $this->input->post('status');
					$form_array['created_date'] = date('Y-m-d');

					$create = $this->Brand_model->update_brand($brand_id,$form_array);

					if($create){

						$this->session->set_flashdata('success','Brands Updated Successfully');
						redirect(base_url().'admin/brands/edit/'.$brand_id);

					}else{

						$this->session->set_flashdata('msg','Something Went Wrong');
						redirect(base_url().'admin/brands/edit/'.$brand_id);
					}

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/brands/edit/'.$brand_id);
				}

			}else{

				$form_array['brand_name'] = $this->input->post('brand_name');
				$slug = url_title($this->input->post('brand_name'), 'dash', true);
				$form_array['brand_slug'] = $slug;
				$form_array['meta_title'] = $this->input->post('meta_title');
				$form_array['meta_description'] = $this->input->post('meta_description');
				$form_array['status'] = $this->input->post('status');
				$form_array['created_date'] = date('Y-m-d');

				$create = $this->Brand_model->update_brand($brand_id,$form_array);

				if($create){

					$this->session->set_flashdata('success','Brands Updated Successfully');
					redirect(base_url().'admin/brands/edit/'.$brand_id);

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/brands/edit/'.$brand_id);
				}
			}

		}else{

			$data['category'] = $var;

			$this->load->view('admin/edit-brand',$data);
		}

	}

	public function delete($brand_id)
	{
		$var = $this->Brand_model->get_single_record($brand_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Brands Not Found');
			redirect(base_url().'admin/brands/index');
		}

		if($var['image']!="" && file_exists('./public/uploads/brands/'.$var['image'])){
			unlink('./public/uploads/brands/'.$var['image']);
		}

		if($var['image']!="" && file_exists('./public/uploads/brands/thumb/'.$var['image'])){
			unlink('./public/uploads/brands/thumb/'.$var['image']);
		}

		$delete = $this->Brand_model->delete_brands($brand_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/brands/index/');

		}else
		{
			$this->session->set_flashdata('error',"Brands Not Deleted");
			redirect(base_url().'admin/brands/index/');
		}

	}
}
