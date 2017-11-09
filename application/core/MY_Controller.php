<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('/www/weixinadmin/application/libraries/logger.php');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->_check_auth();
	}

	private function _check_auth(){
		// if (! $this->session->userdata('logged_in')) {
		// 	$seckey = isset($_REQUEST['gmid']) ? $_REQUEST['gmid'] : '';
		// 	if ($seckey == SEC_KEY) {
		// 		return;
		// 	}
		// 	if ($this->router->class != 'login') {
		// 		$this->session->set_userdata('next', $this->uri->uri_string);
		// 		redirect('/login');
		// 	}
		// }else{
		// 	$this->load->config('myconfig');
		// 	$controllerDeny = $this->config->item('controllerDeny');
		// 	$sessionUser = $this->session->userdata('user');
		// 	$currentPlat = $sessionUser->currentPlat;
		// 	$nowClass = strtolower($this->router->class);
		// 	if (isset($controllerDeny[$currentPlat]) && in_array($nowClass, $controllerDeny[$currentPlat])) {
		// 		$before = $_SERVER["HTTP_REFERER"];
		// 		$now = $_SERVER['REQUEST_URI'];

		// 		$aArr = (explode('/', $before));
		// 		$bArr = (explode('/', $now));
		// 		array_pop($aArr);
		// 		array_pop($bArr);

		// 		if (end($aArr) !== end($bArr)) {
		// 			echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		// 		}
		// 		die();
		// 	}
		// }
	}

	public function _load_header(){
		// $userData = $this->session->userdata('user');
		// $data = array(
		// 	'username' => $userData->userName,
		// 	'power' => $userData->power,
		// 	'plat' => $userData->currentPlat,
		// );
		$this->load->view('headerview');
		$this->load->view('menuview');
	}

	public function _load_footer(){
		$this->load->view('footerview');
	}
}