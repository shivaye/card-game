<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->model('Colour_model');
		$this->load->model('Brand_model');
		$this->load->model('Size_model');
		$this->load->model('Subcategory_model');
		$this->load->model('dynamic_dependent_model');
		$this->load->library('form_validation');

		// if(empty($admin)){
		// 	$this->session->set_flashdata('msg','Your session has been expired');
		// 	redirect(base_url().'admin/login/index');
		// }
	}

	public function index()
	{
		$getAllProduct = $this->Product_model->getAllProduct();
		$data['getAllProduct'] = $getAllProduct;
		$this->load->view('admin/manage-product',$data);
	}

	public function create()
	{

		$config['upload_path']          = './public/uploads/products/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|webp';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("product_name","Product Name","trim|required");
		$this->form_validation->set_rules("product_code","Product Code","trim|required");
		$this->form_validation->set_rules("product_url","Product Url","trim|required");
		$this->form_validation->set_rules("sale_price","Sale Price","trim|required");
		$this->form_validation->set_rules("offer_price","Offer Price","trim|required");
		
		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image_path'] = $data['file_name'];
					
				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/product/create');
				}

			}


			$form_array['product_name'] = @$this->input->post('product_name');
			$form_array['product_code'] = @$this->input->post('product_code');
			$form_array['product_url'] = @$this->input->post('product_url');
			$form_array['sale_price'] = @$this->input->post('sale_price');
			$form_array['offer_price'] = @$this->input->post('offer_price');
			$form_array['is_active'] = @$this->input->post('is_active');
			$form_array['create_date'] = date('Y-m-d H:i:s');
			$form_array['modify_date'] = date('Y-m-d H:i:s');

			$last_id = $this->Product_model->create($form_array);
			
			$product_id = $last_id;

			if($last_id){

				$this->session->set_flashdata('success','Product Inserted Successfully');
				redirect(base_url().'admin/product/create');

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/product/create');
			}

		}else{

			$this->load->view('admin/add-product');
		}
	}

	public function edit($product_id)
	{	
		$var = $this->Product_model->get_single_record($product_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Product Not Found');
			redirect(base_url().'admin/product/index');
		}

		$config['upload_path']          = './public/uploads/products/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['encrypt_name']         =  true;


		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules("product_name","Product Name","trim|required");
		$this->form_validation->set_rules("product_code","Product Code","trim|required");
		$this->form_validation->set_rules("product_url","Product Url","trim|required");
		$this->form_validation->set_rules("sale_price","Sale Price","trim|required");
		$this->form_validation->set_rules("offer_price","Offer Price","trim|required");

		if($this->form_validation->run()==true){

			if(!empty($_FILES['image']['name']))
			{

				if($this->upload->do_upload('image'))
				{
					if($var['image_path']!="" && file_exists('./public/uploads/products/'.$var['image_path'])){
						unlink('./public/uploads/products/'.$var['image_path']);
					}

					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270); 

					$form_array['image_path'] = $data['file_name'];
					
				}else{

					$error = $this->upload->display_errors();
					$data['errorImageUpload'] = $error;
					$this->session->set_flashdata('msg',$data['errorImageUpload']);
					redirect(base_url().'admin/product/edit/'.$product_id);
				}

			}

			$form_array['product_name'] = @$this->input->post('product_name');
			$form_array['product_code'] = @$this->input->post('product_code');
			$form_array['product_url'] = @$this->input->post('product_url');
			$form_array['sale_price'] = @$this->input->post('sale_price');
			$form_array['offer_price'] = @$this->input->post('offer_price');
			$form_array['is_active'] = @$this->input->post('is_active');
			$form_array['create_date'] = date('Y-m-d H:i:s');
			$form_array['modify_date'] = date('Y-m-d H:i:s');
			
			
			$create = $this->Product_model->update_product($product_id,$form_array);

			if($create){

				$this->session->set_flashdata('success','Product Updated Successfully');
				redirect(base_url().'admin/product/edit/'.$product_id);

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/product/edit/'.$product_id);
			}

		}else{

			$data['product'] = $var;
			$this->load->view('admin/edit-product',$data);
		}

	}

	public function delete($product_id)
	{
		$var = $this->Product_model->get_single_record($product_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Product Not Found');
			redirect(base_url().'admin/product/index');
		}

		if($var['image_path']!="" && file_exists('./public/uploads/products/'.$var['image_path'])){
			unlink('./public/uploads/products/'.$var['image_path']);
		}
		
		
		$delete = $this->Product_model->delete_product($product_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/product/index/');

		}else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect(base_url().'admin/product/index/');
		}

	}

	function delete_image($image_id,$product_id)
	{
		$var = $this->Product_model->get_single_image($image_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','image Not Found');
			redirect(base_url().'admin/product/index');
		}

		if($var['product_image']!="" && file_exists('./public/uploads/products/'.$var['product_id'].'/'.$var['product_image'])){
			unlink('./public/uploads/products/'.$var['product_id'].'/'.$var['product_image']);
		}

		if($var['product_image']!="" && file_exists('./public/uploads/products/'.$var['product_id'].'/thumb/'.$var['product_image'])){
			unlink('./public/uploads/products/'.$var['product_id'].'/thumb/'.$var['product_image']);
		}

		$delete = $this->Product_model->delete_product_single_image($image_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/product/edit/'.$product_id);

		}else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect(base_url().'admin/product/edit/'.$product_id);
		}
	}

	public function delete_varient_image($image_id,$product_id,$varient_id)
	{
		$var = $this->Product_model->get_single_image_varient($image_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','image Not Found');
			redirect(base_url().'admin/product/colouredit/'.$varient_id."/".$product_id);
		}


		if($var['product_image']!="" && file_exists('./public/uploads/products/'.$var['product_id'].'/thumb/'.$var['product_image'])){
			unlink('./public/uploads/products/'.$var['product_id'].'/thumb/'.$var['product_image']);
		}

		$delete = $this->Product_model->delete_product_varient_single_image($image_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/product/colouredit/'.$varient_id."/".$product_id);

		}else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect(base_url().'admin/product/colouredit/'.$varient_id."/".$product_id);
		}
	}

	public function delete_all_varient_image()
	{
		$ids = @$this->input->post('checkbox_value');
		$i=0;
		while($i<@count($ids))
		{
			$var = $this->Product_model->get_single_image_varient($ids[$i]);

			if($var['product_image']!="" && file_exists('./public/uploads/products/'.$var['product_id'].'/thumb/'.$var['product_image'])){
				unlink('./public/uploads/products/'.$var['product_id'].'/thumb/'.$var['product_image']);
			}

			$delete = $this->Product_model->delete_product_varient_single_image($ids[$i]);
			$i++;
		}

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/product/index');

		}else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect(base_url().'admin/product/index');
		}
	}

	public function fetch_subcategory(){

		if(@$this->input->post('category_id'))
		{
			echo $this->dynamic_dependent_model->fetch_subcategory(@$this->input->post('category_id'),@$this->input->post('selected_val'));
		}
	}

	function dragDropUpload($varient_id,$product_id){ 
		if(!empty($_FILES)){ 
            // File upload configuration 

			$uploadPath = './public/uploads/products/colorvarient/'.$product_id.'/'.$varient_id; 
			$config['upload_path'] = $uploadPath; 
			$config['allowed_types'] = '*';
			$config['encrypt_name']  = true; 

			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}

			if (!is_dir($config['upload_path']."/thumb/")) {
				mkdir($config['upload_path']."/thumb/", 0777, TRUE);
			}

            // Load and initialize upload library 
			$this->load->library('upload', $config); 
			$this->upload->initialize($config); 

            // Upload file to the server 
			if($this->upload->do_upload('file')){ 

				$fileData = $this->upload->data();

				resizeImage($config['upload_path'].$fileData['file_name'],$config['upload_path'].'thumb/'.$fileData['file_name'],360,180);

				$uploadData['image'] = $fileData['file_name']; 
				$uploadData['uploaded_on'] = date("Y-m-d H:i:s");
				$uploadData['product_id'] = $product_id;
				$uploadData['varient_id'] = $varient_id; 
                // Insert files info into the database 
				$insert = $this->Product_model->insert_varient_image($uploadData); 
			} 
		} 
	}

	public function delete_color($product_varient_id,$product_id)
	{
		$var = $this->Product_model->get_single_record_varient($product_varient_id,$product_id);

		if(empty($var))
		{
			$this->session->set_flashdata('error','Product Not Found');
			redirect(base_url().'admin/product/varient/'.$product_id);
		}

		$this->load->helper("file");

		delete_files('./public/uploads/products/colorvarient/'.$var['product_id'].'/'.$var['product_colour_id'].'/');

		$delete = $this->Product_model->delete_product_varient_images($product_varient_id,$product_id);

		$delete = $this->Product_model->delete_product_varient1($product_varient_id,$product_id);

		if($delete){

			$this->session->set_flashdata('success',"Successfully Deleted");
			redirect(base_url().'admin/product/varient/'.$product_id);

		}else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect(base_url().'admin/product/varient/'.$product_id);
		}

	}

	public function add_colour()
	{
		$product_id = @$this->input->post('product_id');
		$colour = @$this->input->post('colour');

		if(count($colour)>0)
		{
			$i=0;
			while($i<@count($colour)){
				$form_array3['product_id'] = $product_id;
				$form_array3['colour_id'] = $colour[$i];
				$insert = $this->Product_model->insert_colour($form_array3);
				$i++;
			}

			if($insert){

				$this->session->set_flashdata('success','Varient Inserted Successfully');
				redirect(base_url().'admin/product/varient/'.$product_id);

			}else{

				$this->session->set_flashdata('msg','Something Went Wrong');
				redirect(base_url().'admin/product/varient/'.$product_id);
			}
		}


	}

	public function sortable()
	{
		$position = @$_REQUEST['position'];
		$i=1;
		foreach($position as $k=>$v){
			$form_array['position_order'] = $i;
			$this->Product_model->update_product($v,$form_array);
			$i++;
		}
	}

	public function imagesortable()
	{
		$position = @$_REQUEST['position'];
		$product_id = @$_REQUEST['product_id'];
		$i=1;
		foreach($position as $k=>$v){
			$form_array['image_postion'] = $i;
			$this->Product_model->update_Image($v,$form_array,$product_id);
			$i++;
		}
	}

	public function sortable_varient_image()
	{
		$position = @$_REQUEST['position'];
		$i=1;
		foreach($position as $k=>$v){
			$form_array['v_position'] = $i;
			$this->Product_model->update_product_varient_image($v,$form_array);
			$i++;
		}
	}

	public function front_id()
	{
		$product_id = @$_REQUEST['product_id'];
		$form_array['front_id'] = @$_REQUEST['front_id'];

		$create = $this->Product_model->update_product($product_id,$form_array);

		if($create){

			echo "Updated Successfully";
		}else
		{
			echo "Updated Successfully";
		}	
	}
}
