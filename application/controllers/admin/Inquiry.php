<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');
		$this->load->library('form_validation');
		$this->load->model('Inquiry_model');
		$this->load->helper('common_helper'); 

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		$data = array(); 
		$data['inquiry'] = $this->Inquiry_model->getAllinquiry();
		$this->load->view('admin/inquiry',$data);
	}

	public function newsletter()
	{
		$data = array(); 
		$data['getAllnewsletter'] = $this->Inquiry_model->getAllnewsletter();
		$this->load->view('admin/newsletter',$data);
	}

	public function callme()
	{
		$data = array(); 
		$data['callme'] = $this->Inquiry_model->getAllcallme();
		$this->load->view('admin/callme',$data);
	}

	public function points()
	{
		$data = array(); 
		$data['points'] = $this->Inquiry_model->getAllPoints();
		$this->load->view('admin/points',$data);
	}

	public function update_reedeem($id,$remarks)
	{
		$formarray = array();
		$formarray['remarks'] = $remarks;
		$formarray['status'] = 1;
		$formarray['updated_date'] = date('Y-m-d');
		$update = $this->Inquiry_model->update_reedeem($id,$formarray);

		if($update){

			$this->session->set_flashdata('success',"Successfully Updated");
			redirect(base_url().'admin/inquiry/points');

		}else
		{
			$this->session->set_flashdata('error',"Not Updated");
			redirect(base_url().'admin/inquiry/points');
		}
	}

	public function tickets()
	{
		$data = array(); 
		$data['getAllTickets'] = $this->Inquiry_model->getAllTickets();
		$this->load->view('admin/tickets',$data);
	}

	public function ticket_detail($ticket_id)
	{
		$data['ticket_chats'] = $this->Inquiry_model->ticket_chats("1",$ticket_id);
		$data['ticket_id']  = $ticket_id;
		$this->load->view('admin/ticket_chat',$data);

	}

	public function create_chat_ticket()
	{
		$form_array['message'] = @$_REQUEST['message'];
		$form_array['ticket_id'] = @$_REQUEST['ticket_id'];
		$form_array['created_date'] = date("Y-m-d H:i:s");
		$form_array['status'] = "1";
		$form_array['user_id'] = "admin";

		$create = $this->Inquiry_model->create_ticket_msg($form_array);

		if($create){

			$this->session->set_flashdata('success','Message Sent Successfully.');
			redirect(base_url().'admin/inquiry/ticket_detail/'.@$_REQUEST['ticket_id']);
		}else{

			$this->session->set_flashdata('msg','Something Went Wrong');
			redirect(base_url().'admin/inquiry/ticket_detail/'.@$_REQUEST['ticket_id']);
		}

	}

}
