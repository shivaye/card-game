<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');
		$this->load->library('form_validation');
		$this->load->model('Partner_model');
		$this->load->helper('common_helper'); 

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		$data = array(); 
		$data['files'] = $this->Partner_model->getRows();
		$this->load->view('admin/partner',$data);
	}

	function dragDropUpload(){ 
		if(!empty($_FILES)){ 
            // File upload configuration 
			$uploadPath = './public/uploads/partner/'; 
			$config['upload_path'] = $uploadPath; 
			$config['allowed_types'] = '*';
			$config['encrypt_name']  = true; 

            // Load and initialize upload library 
			$this->load->library('upload', $config); 
			$this->upload->initialize($config); 

            // Upload file to the server 
			if($this->upload->do_upload('file')){ 

				$fileData = $this->upload->data(); 
				resizeImage($config['upload_path'].$fileData['file_name'],$config['upload_path'].'thumb/'.$fileData['file_name'],300,270);
				$uploadData['file_name'] = $fileData['file_name']; 
				$uploadData['uploaded_on'] = date("Y-m-d H:i:s"); 

                // Insert files info into the database 
				$insert = $this->Partner_model->insert($uploadData); 
			} 
		} 
	}

	public function delete($category_id)
	{
		$var = $this->Partner_model->get_single_record($category_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Image Not Found');
			redirect(base_url().'admin/partner/index');
		}

		if($var['file_name']!="" && file_exists('./public/uploads/partner/'.$var['file_name'])){
			unlink('./public/uploads/partner/'.$var['file_name']);
		}

		if($var['file_name']!="" && file_exists('./public/uploads/partner/thumb/'.$var['file_name'])){
			unlink('./public/uploads/partner/thumb/'.$var['file_name']);
		}

		$delete = $this->Partner_model->delete_category($category_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/partner/index/');

		}else
		{
			$this->session->set_flashdata('error',"Partner Not Deleted");
			redirect(base_url().'admin/category/index/');
		}

	}

	function delete_all()
	{
		if($this->input->post('checkbox_value'))
		{
			$id = $this->input->post('checkbox_value');
			for($count = 0; $count < count($id); $count++)
			{
				$var = $this->Partner_model->get_single_record($id[$count]);
				if($var['file_name']!="" && file_exists('./public/uploads/partner/'.$var['file_name'])){
					unlink('./public/uploads/partner/'.$var['file_name']);
				}

				if($var['file_name']!="" && file_exists('./public/uploads/partner/thumb/'.$var['file_name'])){
					unlink('./public/uploads/partner/thumb/'.$var['file_name']);
				}

				$this->Partner_model->delete($id[$count]);
			}

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/partner/index/');
		}
	}

	function update_caption()
	{
		$pro_id = array_shift($_POST);
		foreach($_POST as $key=>$cap)
		{
			$cap_id= str_replace('img_','', $key);
			$form_array['caption'] = $cap;
			$update = $this->Partner_model->update_caption($cap_id,$form_array);
		}
		if($update){

			$this->session->set_flashdata('success','Caption Updated Successfully');
			redirect(base_url().'admin/partner/index/');

		}else{

			$this->session->set_flashdata('msg','Something Went Wrong');
			redirect(base_url().'admin/partner/index/');
		}
	}
}
