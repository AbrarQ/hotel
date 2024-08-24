<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function checkUser()
	{
		$Username = $this->input->post('Username');
		$password = $this->input->post('password');
		return $this->db->get_where("admin", array("Admin_Email"=>$Username, "Admin_Password"=>$password))->row();
	}
	
	
}
