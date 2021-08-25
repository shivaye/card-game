<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Faq_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		
		$getAllfaq = $this->Faq_model->getAllfaq();
		$data['getAllfaq'] = $getAllfaq;
		$this->load->view('admin/manage-faq',$data);
	}


	public function create()
	{

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("question","Question","trim|required");

		if($this->form_validation->run()==true){

			$form_array['question'] = $this->input->post('question');
			$form_array['answer'] = $this->input->post('answer');
			$form_array['created_date'] = date('Y-m-d');

			$create = $this->Faq_model->create($form_array);

			if($create){

				$this->session->set_flashdata('success','Faq Inserted Successfully');
				redirect(base_url().'admin/faq/create');

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/faq/create');
			}


		}else{

			$this->load->view('admin/add-faq');
		}
	}

	public function edit($faq_id)
	{	
		$var = $this->Faq_model->get_single_record($faq_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Faq Not Found');
			redirect(base_url().'admin/faq/index');
		}

		
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("question","Question","trim|required");

		if($this->form_validation->run()==true){

			$form_array['question'] = $this->input->post('question');
			$form_array['answer'] = $this->input->post('answer');
			$form_array['created_date'] = date('Y-m-d');

			$create = $this->Faq_model->update_faq($faq_id,$form_array);

			if($create){

				$this->session->set_flashdata('success','Faq Updated Successfully');
				redirect(base_url().'admin/faq/edit/'.$faq_id);

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/faq/edit/'.$faq_id);
			}

		}else{

			$data['Faq'] = $var;

			$this->load->view('admin/edit-faq',$data);
		}

	}

	public function delete($faq_id)
	{
		$var = $this->Faq_model->get_single_record($faq_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Faq Not Found');
			redirect(base_url().'admin/faq/index');
		}

		$delete = $this->Faq_model->delete_faq($faq_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/faq/index/');

		}else
		{
			$this->session->set_flashdata('error',"Video Not Deleted");
			redirect(base_url().'admin/faq/index/');
		}

	}

	public function sortable()
	{
		$position = @$_REQUEST['position'];
		$i=1;
		foreach($position as $k=>$v){
			$form_array['order_id'] = $i;
			$this->Faq_model->update_faq($v,$form_array);
			$i++;
		}
	}
}
