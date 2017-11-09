<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UserInfo extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database('admin');
	}

	public function getUserInfo(){
		$sql = "select * from rk_admin ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}