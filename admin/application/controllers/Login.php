<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
		error_reporting(0);
		/* if()
		{
			redirect(base_url()."index.php", 'refresh');
		} */
	}
	public function index()
	{
		session_destroy();
		$this->load->view('login');
	}
	public function checkUser()
	{
		$res = $this->LoginModel->checkUser();
		
		if(count($res) == 1){
			
			$Admin_ID	 = $res->Admin_ID;
			$Admin_Name	 = $res->Admin_Name;
			
			$this->session->set_userdata('Admin_ID', $Admin_ID);
			$this->session->set_userdata('Admin_Name', $Admin_Name);
			
			redirect(base_url()."index.php/admin", 'refresh');
			
			
		}else{
			redirect(base_url()."index.php/login/", 'refresh');
		} 
	}
	
	public function logout(){
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
		redirect(base_url()."index.php", 'refresh');
	}
}
