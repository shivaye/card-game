<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('Order_model');
        $this->load->model('Product_model');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function neworders()
	{
		$getAllnewOrders = $this->Order_model->getAllnewOrders(0);
		$data['getAllnewOrders'] = $getAllnewOrders;
		$this->load->view('admin/neworders',$data);
	}

    public function orderdetail($order_id)
    {

        $data['order_detail'] = $this->Order_model->OrderDetail($order_id);
        $data['order_items'] = $this->Order_model->OrderItems($order_id);
        $this->load->view('admin/orderdetail',$data);
    }

	public function rejected()
	{
		
		$getAllrejectedOrders = $this->Order_model->getAllrejectedOrders(5);
		$data['getAllrejectedOrders'] = $getAllrejectedOrders;
		$this->load->view('admin/rejectedorders',$data);
	}

	public function completed()
	{
		
		$getAllcompletedOrders = $this->Order_model->getAllcompletedOrders(2);
		$data['getAllcompletedOrders'] = $getAllcompletedOrders;
		$this->load->view('admin/completedorders',$data);
	}

	public function accepted()
	{
		
		$getAllAcceptedOrders = $this->Order_model->getAllcompletedOrders(1);
		$data['getAllAcceptedOrders'] = $getAllAcceptedOrders;
		$this->load->view('admin/accepteddorders',$data);
	}

	public function accepted_order($order_id)
	{
		$form_array['status'] = 1;
		$form_array['updated_date'] = date('Y-m-d');

		$create = $this->Order_model->update_order($order_id,$form_array);

		$this->set_order($order_id);

		if($create){

			$this->session->set_flashdata('success','Order Accepted Successfully');
			redirect(base_url().'admin/order/neworders');

		}else{

			$this->session->set_flashdata('msg','Something Went Wrong');
			redirect(base_url().'admin/order/neworders');
		}
	}


    public function completed_order($order_id)
    {
        $form_array['status'] = 2;
        $form_array['updated_date'] = date('Y-m-d');

        $create = $this->Order_model->update_order($order_id,$form_array);

        if($create){

            $this->session->set_flashdata('success','Order Completed Successfully');
            redirect(base_url().'admin/order/completed');

        }else{

            $this->session->set_flashdata('msg','Something Went Wrong');
            redirect(base_url().'admin/order/completed');
        }
    }


	public function rejected_order($order_id)
	{
		$form_array['status'] = 5;
		$form_array['updated_date'] = date('Y-m-d');

		$create = $this->Order_model->update_order($order_id,$form_array);

		if($create){

			$this->session->set_flashdata('success','Order Rejected Successfully');
			redirect(base_url().'admin/order/neworders');

		}else{

			$this->session->set_flashdata('msg','Something Went Wrong');
			redirect(base_url().'admin/order/neworders');
		}
	}


	public function set_order($order_id) {
    
    $var = $this->Order_model->get_single_record($order_id);

    $timestamp = time();
    $appID = 5672;
    $key = 'LJxy4ASRCrc=';
    $secret = 'ctiaG/OmpnrCSkYLv549PoQOPDRevL/TzoF/AXN+YTSLt7Tdd1C/+nqLsqCxdasPUWwI2jbIQh+I1pMX9VkcMQ==';

    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
    $ch = curl_init();

    $data = Array(
        "orders" => Array(
            
            "0" => Array(
                "orderId" => "$order_id",
                "customerName" => $var['full_name'],
                "customerAddress" => "H.No-141,sec-10 Plot No-25,NUOVO Apartment NEW DELHI - 110075",
                "customerCity" => "New Delhi",
                "customerPinCode" => "110075",
                "customerContact" => "9876543210",
                "orderType" => "Prepaid",
                "modeType" => "Hyperlocal",
                "orderDate" => "2021-01-19",
                
                "package" => Array( 
                    "itemLength" => 12,
                    "itemWidth" => 15,
                    "itemHeight"=> 20,
                    "itemWeight" => 1.5
                ),
                
                "skuList" => Array(
                    
                    "0" => Array(
                        "sku" => "Test",
                        "itemName" => "Item1",
                        "quantity" => 1,
                        "price" => 45.00,
                        "itemLength" => 10, //optional
                        "itemWidth" => 3, //optional
                        "itemHeight"=> 2, //optional
                        "itemWeight" => 2 //optional
                    ),
                    
                    "1" => Array(
                        "sku" => "Test1",
                        "itemName" => "Item2",
                        "quantity" => 1,
                        "price" => 45.00,
                        "itemLength" => null, //optional
                        "itemWidth" => null, //optional
                        "itemHeight"=> null, //optional
                        "itemWeight" => null //optional
                    ),
                    
                    "2" => Array(
                        "sku" => "Test1",
                        "itemName" => "Item3",
                        "quantity" => 1,
                        "price" => 45.00,
                        "itemLength" => 0, //optional
                        "itemWidth" => 0, //optional
                        "itemHeight"=> 0, //optional
                        "itemWeight" => 0 //optional
                    )
                ),
                
                "totalValue" => 1320,
                "sellerAddressId" => 17916
            )
        )
    );

    $data_json = json_encode($data);

    $header = array(
        "x-appid: $appID",
        "x-sellerid:25700",
        "x-timestamp: $timestamp",
        "x-version:3", // for auth version 3.0 only
        "Authorization: $authtoken",
        "Content-Type: application/json",
        "Content-Length: ".strlen($data_json)
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/order?method=sku');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $response  = curl_exec($ch);
   var_dump($response);
   exit();
    curl_close($ch);

}

	
}
