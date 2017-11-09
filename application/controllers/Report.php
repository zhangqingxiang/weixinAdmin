<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('/www/weixinadmin/application/libraries/logger.php');

class Report extends MY_Controller{

	public function home(){
	}

	public function reportClick(){
		$click = isset($_REQUEST['click']) ? $_REQUEST['click'] : '';


		// $userData = $this->session->userdata('user');
		// $data = array(
		// 	'username' => $userData->userName,
		// 	'power' => $userData->power
		// );
		// logger::DayLog("report|username:{$data['username']},click:$click");
	}
	
}