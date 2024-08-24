<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta'); 
	}
	
	 
	 /*Room*/
	 public function bookings(){
		 $condition="";
		 $condition1="";
		 $condition2="";
		 if($this->input->post('From_Date')!=null AND str_word_count($this->input->post('From_Date'))>0){
			 $From_Date =  $this->input->post('From_Date');
			 if($this->input->post('To_Date')!=null AND str_word_count($this->input->post('To_Date'))>0){
				$To_Date =  $this->input->post('To_Date');
			 }else{
				$To_Date = date("Y-m-d"); 
			 }
			 $condition1 = "From_Date between '$From_Date' AND '$To_Date'";
		 } 
		 if($this->input->post('Booking_Status')!=null AND str_word_count($this->input->post('Booking_Status'))>0){
			 $Booking_Status = $this->input->post('Booking_Status');
			$condition2 = "Booking_Status = '$Booking_Status'"; 
		 }
		 if($condition1!=null AND str_word_count($condition1)>0){
			 $condition .= $condition1;
		 }
		 if($condition2!=null AND str_word_count($condition2)>0){
		 if($condition!=null AND str_word_count($condition)>0){
			 $condition .= " AND ";
		 }
			 $condition .= $condition2;
		 }
		 
		 $this->db->select("r.*,b.*");
		 $this->db->from("booking as b");
		 $this->db->join("room_type as r", "r.Room_Type_ID=b.Room_Type_ID");
		 $this->db->order_by("b.Booking_ID", "DESC");
		 if($condition!=null AND str_word_count($condition)>0){
			$this->db->where("$condition");
		 }
		 
		 return $this->db->get()->result_array();
	 } 
	 
	 public function editBooking($Booking_ID)
	{
		return $this->db->get_where("booking", array("Booking_ID"=>$Booking_ID))->row();
	}
	 
	 public function counts(){
		 $this->db->select("Booking_Status, count(*) as count");
		 $this->db->from("booking");
		 $this->db->group_by("Booking_Status");
		 return $this->db->get()->result_array();
	 }
	 public function roomList(){
		 
		 return $this->db->get("room_type")->result_array();
	 }
	 public function roomImages($Room_Type_ID){
		
		 return $this->db->get_where("room_images", array("Room_Type_ID"=>$Room_Type_ID, "Room_Image_Status"=>"ACTIVE"))->result_array();
	 }
	 public function editRoom($Room_Type_ID){
		return $this->db->get_where("room_type",array("Room_Type_ID"=>$Room_Type_ID))->row();
	 }
	  public function insertRoom(){
		 $Room_Type_Name = $this->input->post('Room_Type_Name');
		 $check = $this->db->get_where("room_type", array("Room_Type_Name"=>"$Room_Type_Name"))->row();
		 
		 if(count($check)==0){
			 
			 $roomTypeData  = array(
			 "Room_Type_Name" => $this->input->post('Room_Type_Name'),
			 "Number_of_Adults" => $this->input->post('Number_of_Adults'),
			 "Number_of_Childrens" => $this->input->post('Number_of_Childrens'),
			 "Room_Price" => $this->input->post('Room_Price'),
			 "Room_Description" => $this->input->post('Room_Description'),
			 "Room_Type_Status" => "ACTIVE"
			 );
			 $this->db->insert("room_type", $roomTypeData);
			 $Room_Type_ID = $this->db->insert_id();
			 
			 $i=0; 
			foreach($_FILES["Room_Image"]["tmp_name"] as $tmpimage) {
				
				$random = rand(1, 9);
				$newName = $random."".time();
				$ext = strtolower(pathinfo($_FILES["Room_Image"]["name"][$i],PATHINFO_EXTENSION));
				$file = rand(111,999).time().'.'.$ext;
				$target_file = './images/'.$file;
				$file = base_url().'./images/'.$file;
				if(move_uploaded_file($tmpimage, $target_file)) {
					$fileName[] = $target_file;
					$imageData = array(
					"Room_Type_ID" =>$Room_Type_ID,
					"Room_Image" =>$file,
					"Room_Image_Status"=>'ACTIVE'
					);
					$this->db->insert("room_images", $imageData);
				}
				$i++; 
				
			}
			return 1;
		 }else{
			 return 2;
		 }
		 
		 
		
		
		
	 }
	  public function updateRoom(){
		  $Room_Type_ID = $this->input->post('Room_Type_ID');
		  $Room_Type_Name = $this->input->post('Room_Type_Name');
		 $check = $this->db->get_where("room_type", array("Room_Type_Name"=>"$Room_Type_Name", "Room_Type_ID !="=>$Room_Type_ID))->row();
		 
		 if(count($check)==0){
			 
			 $roomTypeData  = array(
			 "Room_Type_Name" => $this->input->post('Room_Type_Name'),"Number_of_Adults" => $this->input->post('Number_of_Adults'),
			 "Number_of_Childrens" => $this->input->post('Number_of_Childrens'),
			 "Room_Price" => $this->input->post('Room_Price'),
			 "Room_Description" => $this->input->post('Room_Description'),
			 "Room_Type_Status" => "ACTIVE"
			 );
			 $this->db->set($roomTypeData);
			 $this->db->where(array("Room_Type_ID"=>$Room_Type_ID));
			 
			 $this->db->update("room_type", $roomTypeData);
			 $return = 1;
		 }else{
			 $return = 2;
		 }
		$i=0; 
		foreach($_FILES["Room_Image"]["tmp_name"] as $tmpimage) {
			$random = rand(1, 9);
			$newName = $random."".time();
			$ext = strtolower(pathinfo($_FILES["Room_Image"]["name"][$i],PATHINFO_EXTENSION));
			$file = rand(111,999).time().'.'.$ext;
			$target_file = './images/'.$file;
			$file = base_url().'/images/'.$file;
			if(move_uploaded_file($tmpimage, $target_file)) {
				$fileName[] = $target_file;
				$imageData = array(
				"Room_Type_ID" =>$Room_Type_ID,
				"Room_Image" =>$file,
				"Room_Image_Status"=>'ACTIVE'
				);
				$this->db->set($imageData);
				$this->db->insert("room_images", $imageData);
			}
		 $i++;   
		}
		return $return;
	 } 
	 public function deleteRoom($Room_Type_ID){
		 $data = array(
		 "Room_Type_Status" => "DELETED"
		 );
		 $this->db->where(array("Room_Type_ID"=>$Room_Type_ID));
		$this->db->update("room_type", $data);
	 }
	 
	 public function updateBooking(){
		  $Room_Type_ID = $this->input->post('Room_Type_ID');
		  $First_Name = $this->input->post('First_Name');
		  $Last_Name = $this->input->post('Last_Name');
		  $Email = $this->input->post('Email');
		  $Mobile = $this->input->post('Mobile');
		  $Address = $this->input->post('Address');
		  $From_Date = $this->input->post('From_Date');
		  $To_Date = $this->input->post('To_Date');
		  $Number_Of_Rooms = $this->input->post('Number_Of_Rooms');
		  $Number_of_Adults = $this->input->post('Number_of_Adults');
		  $Number_of_Childrens = $this->input->post('Number_of_Childrens');
		  $Booking_Status = $this->input->post('Booking_Status');
		  $Remarks = $this->input->post('Remarks');
		  $Booking_ID = $this->input->post('Booking_ID');
		 // $Room_details = $this->db->get_where("room_type"array("Room_Type_ID"=>$Room_Type_ID))->row();
		  $data = array(
		 "Room_Type_ID" => "$Room_Type_ID",
		 "First_Name" => "$First_Name",
		 "Last_Name" => "$Last_Name",
		 "Email" => "$Email",
		 "Mobile" => "$Mobile",
		 "Address" => "$Address",
		 "From_Date" => "$From_Date",
		 "To_Date" => "$To_Date",
		 "Number_Of_Rooms" => "$Number_Of_Rooms",
		 "Number_of_Adults" => "$Number_of_Adults",
		 "Number_of_Childrens" => "$Number_of_Childrens",
		 "Booking_Status" => "$Booking_Status",
		 "Remarks" => "$Remarks"
		 );
		 $this->db->where(array("Booking_ID"=>$Booking_ID));
		$this->db->update("booking", $data);
		 
		return 1;	
	 }
	 
	
}
