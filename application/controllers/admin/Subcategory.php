<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		
		$getAllSubCategory = $this->Subcategory_model->getAllSubCategory();
		$data['getAllSubCategory'] = $getAllSubCategory;
		$this->load->view('admin/manage-subcategory',$data);
	}


	public function create()
	{

		$config['upload_path']          = './public/uploads/subcategory/';
		$config['upload_path1']          = './public/uploads/subcategory/thumb';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
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
		$this->form_validation->set_rules("subcategory_name","SubCategory Name","trim|required");
		// $this->form_validation->set_rules("meta_title","Meta Title","trim|required");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 
                    $form_array['subcategory_image'] = $data['file_name'];
                    
                 }else{

						$error = $this->upload->display_errors();
					    $data['errorImageUpload'] = $error;
					    $this->session->set_flashdata('msg',$data['errorImageUpload']);
						redirect(base_url().'admin/subcategory/create');
					}

				}

			    $form_array['subcategory_name'] = $this->input->post('subcategory_name');
				$form_array['category_id'] = $this->input->post('category_id');
				$slug = url_title($this->input->post('subcategory_name'), 'dash', true);
				$form_array['subcategory_slug'] = $slug;
				$form_array['meta_title'] = $this->input->post('meta_title');
				$form_array['meta_description'] = $this->input->post('meta_description');
				$form_array['status'] = $this->input->post('status');
				$form_array['created_date'] = date('Y-m-d');

				$create = $this->Subcategory_model->create($form_array);

				if($create){

					$this->session->set_flashdata('success','SubCategory Inserted Successfully');
					redirect(base_url().'admin/subcategory/create');

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/subcategory/create');
				}

		}else{	
			$data['allCategory'] = $this->Category_model->getAllCategory();
		    $this->load->view('admin/create-subcategory',$data);
		    
		}
	}

	public function edit($subcategory_id)
	{	
		$var = $this->Subcategory_model->get_single_record($subcategory_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','SubCategory Not Found');
			redirect(base_url().'admin/subcategory/index');
		}

		$config['upload_path']          = './public/uploads/subcategory/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("subcategory_name","Category Name","trim|required");
		// $this->form_validation->set_rules("meta_title","Meta Title","trim|required");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{

					if($var['subcategory_image']!="" && file_exists('./public/uploads/subcategory/'.$var['subcategory_image'])){
						unlink('./public/uploads/subcategory/'.$var['subcategory_image']);
					}

					if($var['subcategory_image']!="" && file_exists('./public/uploads/subcategory/thumb/'.$var['subcategory_image'])){
						unlink('./public/uploads/subcategory/thumb/'.$var['subcategory_image']);
					}


					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['subcategory_image'] = $data['file_name'];

				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/subcategory/edit/'.$subcategory_id);
				}

			}

				$form_array['subcategory_name'] = $this->input->post('subcategory_name');
				$slug = url_title($this->input->post('subcategory_name'), 'dash', true);
				$form_array['subcategory_slug'] = $slug;
				$form_array['category_id'] = $this->input->post('category_id');
				$form_array['meta_title'] = $this->input->post('meta_title');
				$form_array['meta_description'] = $this->input->post('meta_description');
				$form_array['status'] = $this->input->post('status');
				$form_array['created_date'] = date('Y-m-d');

				$create = $this->Subcategory_model->update_subcategory($subcategory_id,$form_array);

				if($create){

					$this->session->set_flashdata('success','SubCategory Updated Successfully');
					redirect(base_url().'admin/subcategory/edit/'.$subcategory_id);

				}else{

					$this->session->set_flashdata('msg','Something Went Wrong');
					redirect(base_url().'admin/subcategory/edit/'.$subcategory_id);
				}

		}else{

			$allCategory = $this->Category_model->getAllCategory();
			$data['allCategory'] = $allCategory;
			$data['subcategory'] = $var;
			$this->load->view('admin/edit-subcategory',$data);
		}

	}

	public function delete($subcategory_id)
	{
		$var = $this->Subcategory_model->get_single_record($subcategory_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','SubCategory Not Found');
			redirect(base_url().'admin/subcategory/index');
		}

		if($var['subcategory_image']!="" && file_exists('./public/uploads/subcategory/'.$var['subcategory_image'])){
			unlink('./public/uploads/subcategory/'.$var['subcategory_image']);
		}

		if($var['subcategory_image']!="" && file_exists('./public/uploads/subcategory/thumb/'.$var['subcategory_image'])){
			unlink('./public/uploads/subcategory/thumb/'.$var['subcategory_image']);
		}

		$delete = $this->Subcategory_model->delete_category($subcategory_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/subcategory/index/');

		}else
		{
			$this->session->set_flashdata('error',"SubCategory Not Deleted");
			redirect(base_url().'admin/subcategory/index/');
		}

	}

	public function sortable()
	{
		$position = @$_REQUEST['position'];
		$i=1;
		foreach($position as $k=>$v){
			$form_array['subposition'] = $i;
			$this->Subcategory_model->update_subcategory($v,$form_array);
			$i++;
		}
	}


	public function is_shop()
	{
		$subcategory_id = @$_REQUEST['subcategory_id'];
		$form_array['is_shop'] = @$_REQUEST['is_shop'];

		$create = $this->Subcategory_model->update_subcategory($subcategory_id,$form_array);

		if($create){

			echo "Updated Successfully";
		}else
		{
			echo "Updated Successfully";
		}	
	}

	public function is_shop1()
	{
		$subcategory_id = @$_REQUEST['subcategory_id'];
		$form_array['header'] = @$_REQUEST['is_shop1'];

		$create = $this->Subcategory_model->update_subcategory($subcategory_id,$form_array);

		if($create){

			echo "Updated Successfully";
		}else
		{
			echo "Updated Successfully";
		}	
	}
}
