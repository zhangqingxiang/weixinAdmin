<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('/www/weixinadmin/application/libraries/logger.php');

class Login extends MY_Controller{

	public function index(){
		$this->load->view('loginview');
	}

	public function check(){
		$ret = array();
		$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
		$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

		$this->load->model('M_Login');
		// $this->config->load('myconfig');
		$result = $this->M_Login->getUserInfoByName($username);
		$userPwd = $result[0]['password'];
		$password = md5($password);
		if ($password == $userPwd) {
			$ret['ret'] = 1;
		}else{
			$ret['ret'] = 0;
		}
		// $platConfig = $this->config->item('platConfig');
		// $userPlat = $result->plat;
		// $result->currentPlat = $platConfig[$userPlat][0];

		// error_log($password);
		// if (!empty($result) && $password == $result->password) {
		// 	$this->session->set_userdata('logged_in', TRUE);
		// 	$this->session->set_userdata('user', $result);
		// 	$this->session->set_userdata('allowPlat', $platConfig[$userPlat]);
		// 	$ret['ret'] = 0;
		// }else{
		// 	$ret['ret'] = -1;
		// }
		// logger::DayLog("login|usename:{$username}");
		echo json_encode($ret);
	}

	public function logout(){
		$this->session->set_userdata('logged_in', FALSE);
		redirect('/login');
	}
}
