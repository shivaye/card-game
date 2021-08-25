<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('video_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		
		$getAllvideo = $this->video_model->getAllvideo();
		$data['getAllvideo'] = $getAllvideo;
		$this->load->view('admin/manage-video',$data);
	}


	public function create()
	{

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("video_title","Video Title","trim|required");

		if($this->form_validation->run()==true){

			$form_array['video_title'] = $this->input->post('video_title');
			$form_array['short_title'] = $this->input->post('short_title');
			$form_array['video_link'] = $this->input->post('video_link');
			$form_array['video_description'] = $this->input->post('description');
			$form_array['status'] = $this->input->post('status');
			$form_array['created_date'] = date('Y-m-d');

			$create = $this->video_model->create($form_array);

			if($create){

				$this->session->set_flashdata('success','video Inserted Successfully');
				redirect(base_url().'admin/video/create');

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/video/create');
			}


		}else{

			$this->load->view('admin/add-video');
		}
	}

	public function edit($video_id)
	{	
		$var = $this->video_model->get_single_record($video_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','video Not Found');
			redirect(base_url().'admin/video/index');
		}

		
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("video_title","Video Title","trim|required");

		if($this->form_validation->run()==true){

			

			$form_array['video_title'] = $this->input->post('video_title');
			$form_array['short_title'] = $this->input->post('short_title');
			$form_array['video_link'] = $this->input->post('video_link');
			$form_array['video_description'] = $this->input->post('description');
			$form_array['status'] = $this->input->post('status');
			$form_array['created_date'] = date('Y-m-d');

			$create = $this->video_model->update_video($video_id,$form_array);

			if($create){

				$this->session->set_flashdata('success','video Updated Successfully');
				redirect(base_url().'admin/video/edit/'.$video_id);

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/video/edit/'.$video_id);
			}

		}else{

			$data['video'] = $var;

			$this->load->view('admin/edit-video',$data);
		}

	}

	public function delete($video_id)
	{
		$var = $this->video_model->get_single_record($video_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Video Not Found');
			redirect(base_url().'admin/video/index');
		}

		$delete = $this->video_model->delete_video($video_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/video/index/');

		}else
		{
			$this->session->set_flashdata('error',"Video Not Deleted");
			redirect(base_url().'admin/video/index/');
		}

	}
}
