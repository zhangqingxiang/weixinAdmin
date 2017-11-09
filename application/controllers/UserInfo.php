<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('/www/weixinadmin/application/libraries/logger.php');

class UserInfo extends MY_Controller{

	public function home(){
		$this->_load_header();
		$this->load->view('userinfoview');
		$this->_load_footer();
	}

	public function getUserInfo(){
		$ret = array();
		$this->load->model('M_UserInfo');
		$data = $this->M_UserInfo->getUserInfo();
		if (empty($data)) {
			$ret['ret'] = 0;
			$ret['data'] = array();
			echo json_encode($ret);
			return;
		}
		$ret['ret'] = 0;
		$ret['data'] = $data;
		echo json_encode($ret);
		return;
	}

}
