<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$admin = $this->session->userdata('admin');

		$this->load->helper('common_helper');
		$this->load->model('CardModel');
		$this->load->library('form_validation');

		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'admin/login/index');
		}
	}

	public function index()
	{
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

		$this->form_validation->set_rules("play","Play","trim|required");

		if($this->form_validation->run()==true){

			$card_number = count($_POST['cards']);

			if($card_number>13)
			{
				$this->session->set_flashdata('msg','Card Number is must be less than or equal to 13');
				redirect(base_url().'admin/card/index');
			}

			if($card_number<5)
			{
				$this->session->set_flashdata('msg','Card Number is must be greater than or equal to 5');
				redirect(base_url().'admin/card/index');
			}

			$admin = $this->session->userdata('admin');

			$cards_users = implode(",",$_POST['cards']);


			$getAllCards = $this->CardModel->getAllRandomCards($card_number*3,$cards_users);

			foreach($getAllCards as $cards)
			{
				$card_ids[] = $cards['card_id'];
			}

			$var = array_chunk($card_ids,$card_number,true);

			$form_array['player_id'] = $admin['admin_id'];
			$form_array['card_number'] = $card_number;
			$form_array['p1'] = $cards_users;
			$form_array['p2'] = implode(",",$var[0]);
			$form_array['p3'] = implode(",",$var[1]);
			$form_array['p4'] = implode(",",$var[2]);
			$form_array['created_time'] = date('Y-m-d H:i:s');

			$game_id = $this->CardModel->insert_game($form_array);

			$getUsersCard = $this->CardModel->getUsersCard($game_id);

			$p1 = explode(",",$getUsersCard['p1']);
			$p2 = explode(",",$getUsersCard['p2']);
			$p3 = explode(",",$getUsersCard['p3']);
			$p4 = explode(",",$getUsersCard['p4']);

			$i=0;
			while($i<count($p1))
			{
			  $cards_valuesp1 = $this->CardModel->getSingleCard($p1[$i]);
			  $cards_valuesp2 = $this->CardModel->getSingleCard($p2[$i]);
			  $cards_valuesp3 = $this->CardModel->getSingleCard($p3[$i]);
			  $cards_valuesp4 = $this->CardModel->getSingleCard($p4[$i]);

			  $temp['p1'] = $cards_valuesp1['card_value'];
			  $temp['p2'] = $cards_valuesp2['card_value'];
			  $temp['p3'] = $cards_valuesp3['card_value'];
			  $temp['p4'] = $cards_valuesp4['card_value'];

			  $maxVal = max($temp);
			  $user_win = array_search($maxVal, $temp);

			 	$form_array2['game_id'] = $game_id;
				$form_array2['p1'] = $cards_valuesp1['card_name']." ".$cards_valuesp1['shape'];
				$form_array2['p2'] = $cards_valuesp2['card_name']." ".$cards_valuesp2['shape'];
				$form_array2['p3'] = $cards_valuesp3['card_name']." ".$cards_valuesp3['shape'];
				$form_array2['p4'] = $cards_valuesp4['card_name']." ".$cards_valuesp4['shape'];
				$form_array2['winner_palyer'] = $user_win;
				$form_array2['winner_card'] = $temp[$user_win];
				$form_array2['created_time'] = date('Y-m-d H:i:s');

				$inserted = $this->CardModel->inserts($form_array2);
			  $i++;
			}

			$data['score_card'] = $this->CardModel->getScoreCard($game_id);
			$data['gamesturn'] = $this->CardModel->gamesturn($game_id);
			$data['getAllCards'] = $this->CardModel->getAllCards();
			$data['card_number'] = $card_number;

			$this->load->view('admin/play',$data);

		}else{

			$data['getAllCards'] = $this->CardModel->getAllCards();
			$this->load->view('admin/play',$data);
		}
	}


}
