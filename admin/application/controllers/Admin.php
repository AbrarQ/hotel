<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		error_reporting(0);
		if($this->session->userdata('Admin_ID') == null)
		{
			redirect(base_url()."index.php", 'refresh');
		}
	}
	public function index()
	{
		$data['counts'] = $this->AdminModel->counts();
		$this->load->view('dashboard', $data);
	}
	
	/*room*/
	public function bookings()
	{
		$data['bookings'] = $this->AdminModel->bookings();
		$this->load->view('booking', $data);
	}
	public function room()
	{
		$data['roomList'] = $this->AdminModel->roomList();
		$this->load->view('room', $data);
	}
	public function addRoom()
	{
		$this->load->view('addRoom');
	}
	
	public function insertRoom()
	{
		$res = $this->AdminModel->insertRoom();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'index.php/Admin/room');
		}else if($res == 2){
			//Image  Not Uploaded
			$this->load->view('addRoom');
		}else{
			//Something went wrong
			$this->load->view('addRoom');
		}
	}public function editBooking($Booking_ID)
	{
		$data['bookingDetails'] = $this->AdminModel->editBooking($Booking_ID);
		$data['roomList'] = $this->AdminModel->roomList();
		$this->load->view('editBooking', $data);
		
	}
	public function updateBooking()
	{
		
			$res = $this->AdminModel->updateBooking();
			if($res == 1){
				$Booking_Status = $this->input->post('Booking_Status');
				if($Booking_Status=="APPROVED"){
					$First_Name = $this->input->post('First_Name');
					$Last_Name = $this->input->post('Last_Name');
					$Email = $this->input->post('Email');
					$message = "Dear $First_Name $Last_Name,<br><br>";
					$message .= "You booking is confirmed by Alexander Luxury Hotel. Your Booking ID: ALEX_".$this->input->post('Booking_ID');
							
							
				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'http://sreevishnugroups.com/mail.php',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS => array('from' => 'AlexanderLuxuryHotel@gmail.com','to' => "$Email",'subject' => 'Booking Confirmation','message' => "$message"),
				));

				$response = curl_exec($curl);

				curl_close($curl);
					
				}
				
				//Successfully Inserted
				redirect(base_url().'index.php/Admin/bookings');
			}else if($res == 2){
				//Image  Not Uploaded
				redirect(base_url().'index.php/Admin/editBooking/'.$this->input->post('Booking_ID'));
			}else{
				//Something went wrong
				redirect(base_url().'index.php/Admin/editBooking/'.$this->input->post('Booking_ID'));
			}
		
	}
	public function approve($Booking_ID)
	{
		$data = array(
		"Booking_Status"=>"APPROVED"
		);
		$this->db->where(array("Booking_ID"=>$Booking_ID));
		$this->db->update("booking", $data);
		redirect(base_url().'index.php/Admin/bookings');
		
	}
	public function cancel($Booking_ID)
	{
		$data = array(
		"Booking_Status"=>"CANCELLED"
		);
		$this->db->where(array("Booking_ID"=>$Booking_ID));
		$this->db->update("booking", $data);
		redirect(base_url().'index.php/Admin/bookings');
		
	}
	
	public function editRoom($room_ID)
	{
		$data['room'] = $this->AdminModel->editRoom($room_ID);
		$data['roomImages'] = $this->AdminModel->roomImages($room_ID);
		$this->load->view('editRoom', $data);
	}
	
	
	public function updateRoom()
	{
		
			$res = $this->AdminModel->updateRoom();
			if($res == 1){
				//Successfully Inserted
				redirect(base_url().'index.php/Admin/room');
			}else if($res == 2){
				//Image  Not Uploaded
				redirect(base_url().'index.php/Admin/editRoom/'.$this->input->post('room_ID'));
			}else{
				//Something went wrong
				redirect(base_url().'index.php/Admin/editRoom/'.$this->input->post('room_ID'));
			}
		
	}
	public function deleteRoom($Room_ID)
	{
			
		$res = $this->AdminModel->deleteRoom($Room_ID);
			
		redirect(base_url().'index.php/Admin/room');
			
	}
	
	
	
	
}
