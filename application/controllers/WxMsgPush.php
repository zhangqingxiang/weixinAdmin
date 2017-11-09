<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WxMsgPush extends MY_Controller{

	public function home(){
		$this->_load_header();
		$this->load->view('wxmsgpushview');
		$this->_load_footer();
	}

	public function getData(){
		$start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
		$length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
		if($start == ''|| $length=='') {
			$ret = array();
			echo json_encode($ret);
			return;
		}
		$this->load->model('M_WakeupLoginUserCnt');
		$data = $this->M_WakeupLoginUserCnt->getPayData($start, $length);			
		$ret = array();
		$ret['ret'] = 0;
		$ret['data'] = $data['data'];
		$ret['recordsTotal'] = $data['cnt'];
		$ret['recordsFiltered'] = $data['cnt'];
		echo json_encode($ret);
		return;
	}
}