<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller{

	public function home(){
		$this->_load_header();
		$this->load->view('mainview');
		$this->_load_footer();
	}
}