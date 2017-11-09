<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database('admin');
	}

	public function getUserInfoByName($userName){
		$userName = trim($userName);
		$sql = "select * from rk_admin where username='$userName'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function addOper($username, $password, $power){
		$userData = $this->session->userdata('user');
		if ($userData->power != 0) {
			return -1;
		}

		$password = strtoupper(md5($password));
		$sql = "insert into t_operator(userName, password, power) values(?, ?, ?)";
		$query = $this->db->query($sql, array($username, $password, $power));
		if (!$query) {
			return -2;
		}
		return 0;
	}
}