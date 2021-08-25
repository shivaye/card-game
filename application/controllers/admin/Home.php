<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Colour_model');
		$this->load->library('form_validation');
		$this->load->library('csvimport');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		$admin = $this->session->userdata('admin');
		// $category = $this->db->count_all_results('category');
		// $product = $this->db->count_all_results('product');
		// $subcategory = $this->db->count_all_results('subcategory');
		// $members = $this->db->count_all_results('customers');
		// $total_orders = $this->db->count_all_results('orders');
		// $new_orders = $this->db->where(array('status' => 0 ))->count_all_results('orders');
		// $completed_orders = $this->db->where(array('status' => 4 ))->count_all_results('orders');
		// $rejected_orders = $this->db->where(array('status' => 3 ))->count_all_results('orders');
		// $output = array("category"=>$category,"product"=>$product,"subcategory"=>$subcategory,"members"=>$members,"total_orders"=>$total_orders,"new_orders"=>$new_orders,"completed_orders"=>$completed_orders,"rejected_orders"=>$rejected_orders);
		$data['output'] = "1";
		$this->load->view('admin/index',$data);
	}

	public function import()
	{
		$this->load->view('admin/import');
	}

	public function users()
	{
		$data['users'] = $this->Colour_model->getUsers();
		$this->load->view('admin/manage-users',$data);
	}

	function import_data()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);

		foreach($file_data as $row)
		{
			$data[] = array(
				'state' => $row["State"],
				'ac_no'  => $row["AC No"],
				'part_no'   => $row["Part No"],
				'section_no'   => $row["Section No"],
				'serial_no' => $row["Serial No"],
				'total_number'  => $row["Total Number"],
				'name'   => $row["Name"],
				'first_name'   => $row["First Name"],
				'middle_name' => $row["Middle Name"],
				'last_name'  => $row["Last Name"],
				'complete_address'   => $row["Complete Address"],
				'houseno'   => $row["HouseNo"],
				'location' => $row["Location"],
				'block'  => $row["Landmark/Block"],
				'gender'   => $row["Gender"],
				'relname'   => $row["RelName"],
				'RType' => $row["RType"],
				'Age'  => $row["Age"],
				'IDCardNo'   => $row["IDCardNo"],
				'caste'   => $row["Caste"],
				'caste_category' => $row["CASTE Category"],
				'Affiliation'  => $row["Affiliation"],
				'origin'   => $row["Place of origin"],
				'residence'   => $row["Residence Own-1, Rent- 2"],
				'Statustype' => $row["Statustype"],
				'marital_status'  => $row["Marital Status"],
				'visit_1'   => $row["First Visit Number"],
				'visit_2'   => $row["Second Visit Number"],
				'visit_3' => $row["Third visit No"],
				'visit_4'  => $row["Fourth Visit"],
				'visit_5'   => $row["Fifth Visit no"],
				'visit_6'   => $row["Sixth call no"],
				'visit_7'   => $row["Seventh Visit no"],
				'family_id_new'   => $row["Family id new"],
				'family_head_name'   => $row["Family member Head name"],
				'family_head_voter' => $row["Family Head voter ID"],
				'engsection'  => $row["Engsection"],
				'boothname'   => $row["Boothname"],
				'total_complaint'   => $row["Total Complaints"],
				'total_visits'   => $row["Total Visits"],
				'total_call'   => $row["Total Call"],
				'data_type'   => $row["Data Type"],
			);
		}

		$insert = $this->Colour_model->insert($data);
		
		if($insert)
		{
		  $this->session->set_flashdata('success','Data Imported Successfully');
				redirect(base_url().'admin/home/import');
		}else{
			$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/home/import');
		}
	}
}
