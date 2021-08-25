<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->helper('common_helper');
		$this->load->model('CardModel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('front/index');
	}

	public function insert_card()
	{
	  
	   $card_type = array("clubs","diamonds","hearts","spades");
	   $card_number = array("2","3","4","5","6","7","8","9","10","J","A","K","Q");

	   $card_value = array("1","2","3","4","5","6","7","8","9","10","11","12","13");

	   $i=1;
	   foreach($card_type as $type)
	   {

	   	foreach ($card_number as $ind => $value) {

	   	$form_array['card_name'] = $value;
	   	$form_array['shape'] = $type;
	   	$form_array['card_value'] = $card_value[$ind];

	   	$this->CardModel->insert_card($form_array);
	   		echo "<br>";
	   	    echo $value."  ".$type;

	   	}

	   	$i++;
	     echo "<hr>";

	   }

	}
}
