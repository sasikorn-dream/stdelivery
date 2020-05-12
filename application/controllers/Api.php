<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}
	public function is_login(){

		if($this->session->userdata("login")){
			echo 1;
		}
		else{
			echo 0;
		}
}
	public function login()
	{
		$postdata = file_get_contents("php://input");
		$data = json_decode($postdata);
		// pre($data);
		$member =	$this->db->select('member_id,username')
			->get_where("member", array('username' => $data->username, 'password' => md5($data->password)));
		if ($member->num_rows() > 0) {
			$output = array('login' => 'success', 'data' => $member->row());
			$this->session->set_userdata('user', $member->row());
			$this->session->set_userdata('login',true);
		} else {
			$output = array('login' => 'fail');
		}
		echo json_encode($output);
	}
	public function logout()
	{
		echo $this->session->sess_destroy();
	}

	public function register(){
	
		$postdata = file_get_contents("php://input");
		$datain = json_decode($postdata);
		// pre($data);
		
		if ($datain->password_regis1 == $datain->password_regis2) {
				$data = array(
					'member_id' => '',
					'username'	=> $datain->username_regis,
					'email' => $datain->email_regis,
					'password' 	=> md5($datain->password_regis1)
				);
				$status = $this->db->insert("member",$data);
				if($status>0){
					$output = array('register' => 'success');
				}else{
					$output = array('register' => 'fail');
				}
			}else{
				$output = array('register' => 'fail');
			}
			echo json_encode($output);
	}
}
