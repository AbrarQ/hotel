<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FerModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta'); 
	}
	
	/*SOIL*/
	 public function insertSoil(){
		 $SOIL_TYPE = $this->input->post('SOIL_TYPE');
		 $check = $this->db->get_where("fer_soil",array('SOIL_TYPE'=>$SOIL_TYPE))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "SOIL_TYPE" => $SOIL_TYPE,
			 "SOIL_STATUS" => 'ACTIVE',
			 "CREATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "CREATED_BY" => $this->session->userdata('EMPLOYEE_ID'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->insert("fer_soil",$data);
			 $id = $this->db->insert_id();
			 if($id != null){
				 return 1;
			 }else{
				 return 2;
			 }
		 }else{
			 return 3;
		 }
	 }
	 
	 public function soilList(){
		 return $this->db->get("fer_soil")->result_array();
	 }
	 public function soilByID($SOIL_ID){
		 return $this->db->get_where("fer_soil", array("SOIL_ID"=>$SOIL_ID))->row();
	 }
	public function updateSoil(){
		 $SOIL_ID = $this->input->post('SOIL_ID');
		 $SOIL_TYPE = $this->input->post('SOIL_TYPE');
		 $check = $this->db->get_where("fer_soil",array('SOIL_TYPE'=>$SOIL_TYPE, 'SOIL_ID !='=>$SOIL_ID))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "SOIL_TYPE" => $SOIL_TYPE,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("SOIL_ID"=>$SOIL_ID));
			 $this->db->update("fer_soil",$data);
			 
			return 1;
			 
		 }else{
			 return 2;
		 }
	 }
	public function deleteSoil($SOIL_ID,$status){
		 
			 $data = array(
			 "SOIL_STATUS" => $status,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("SOIL_ID"=>$SOIL_ID));
			 $this->db->update("fer_soil",$data);
			 
			return 1;
			 
		 
	 }
	/*chemical*/
	 public function insertChemical(){
		 $CHEMICAL_NAME = $this->input->post('CHEMICAL_NAME');
		 $check = $this->db->get_where("fer_chemical",array('CHEMICAL_NAME'=>$CHEMICAL_NAME))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "CHEMICAL_NAME" => $CHEMICAL_NAME,
			 "CHEMICAL_STATUS" => 'ACTIVE',
			 "CREATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "CREATED_BY" => $this->session->userdata('EMPLOYEE_ID'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->insert("fer_chemical",$data);
			 $id = $this->db->insert_id();
			 if($id != null){
				 return 1;
			 }else{
				 return 2;
			 }
		 }else{
			 return 3;
		 }
	 }
	 
	 public function chemicalList(){
		 return $this->db->get("fer_chemical")->result_array();
	 }
	 public function chemicalByID($CHEMICAL_ID){
		 return $this->db->get_where("fer_chemical", array("CHEMICAL_ID"=>$CHEMICAL_ID))->row();
	 }
	public function updateChemical(){
		 $CHEMICAL_ID = $this->input->post('CHEMICAL_ID');
		 $CHEMICAL_NAME = $this->input->post('CHEMICAL_NAME');
		 $check = $this->db->get_where("fer_chemical",array('CHEMICAL_NAME'=>$CHEMICAL_NAME, 'CHEMICAL_ID !='=>$CHEMICAL_ID))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "CHEMICAL_NAME" => $CHEMICAL_NAME,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("CHEMICAL_ID"=>$CHEMICAL_ID));
			 $this->db->update("fer_chemical",$data);
			 
			return 1;
			 
		 }else{
			 return 2;
		 }
	 }
	public function deleteChemical($CHEMICAL_ID,$status){
		 
			 $data = array(
			 "CHEMICAL_STATUS" => $status,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("CHEMICAL_ID"=>$CHEMICAL_ID));
			 $this->db->update("fer_chemical",$data);
			 
			return 1;
			 
		 
	 }
	 
	 /*chemical Details*/
	 public function insertChemicalDetails(){
		 $CHEMICAL_ID = $this->input->post('CHEMICAL_ID');
		 $CHEMICAL_DETAIL_NAME = $this->input->post('CHEMICAL_DETAIL_NAME');
			$data = array(
			 "CHEMICAL_ID" => $CHEMICAL_ID,
			 "CHEMICAL_DETAIL_NAME" => $CHEMICAL_DETAIL_NAME,
			 "CHEMICAL_DETAIL_STATUS" => 'ACTIVE',
			 "CREATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "CREATED_BY" => $this->session->userdata('EMPLOYEE_ID'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->insert("fer_chemical_detail",$data);
			 $id = $this->db->insert_id();
			 if($id != null){
				 return 1;
			 }else{
				 return 2;
			 }
		 
	 }
	 
	 public function chemicalDetailsList(){
		 $this->db->select("c.CHEMICAL_NAME, cd.*");
		 $this->db->from("fer_chemical_detail as cd");
		 $this->db->join("fer_chemical as c", "c.CHEMICAL_ID=cd.CHEMICAL_ID");
		 return $this->db->get()->result_array();
	 }
	 public function chemicalDetailsByID($CHEMICAL_DETAIL_ID){
		 $this->db->select("c.CHEMICAL_NAME, cd.*");
		 $this->db->from("fer_chemical_detail as cd");
		 $this->db->join("fer_chemical as c", "c.CHEMICAL_ID=cd.CHEMICAL_ID");
		 $this->db->where(array("cd.CHEMICAL_DETAIL_ID"=>$CHEMICAL_DETAIL_ID));
		 return $this->db->get()->row();
		  
	 }
	public function updateChemicalDetails(){
		 $CHEMICAL_DETAIL_ID = $this->input->post('CHEMICAL_DETAIL_ID');
		 $CHEMICAL_ID = $this->input->post('CHEMICAL_ID');
		 $CHEMICAL_DETAIL_NAME = $this->input->post('CHEMICAL_DETAIL_NAME');
		 $check = $this->db->get_where("fer_chemical_detail",array('CHEMICAL_DETAIL_NAME'=>$CHEMICAL_DETAIL_NAME, 'CHEMICAL_DETAIL_ID !='=>$CHEMICAL_DETAIL_ID))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "CHEMICAL_ID" => $CHEMICAL_ID,
			 "CHEMICAL_DETAIL_NAME" => $CHEMICAL_DETAIL_NAME,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("CHEMICAL_DETAIL_ID"=>$CHEMICAL_DETAIL_ID));
			 $this->db->update("fer_chemical_detail",$data);
			 
			return 1;
			 
		 }else{
			 return 2;
		 }
	 }
	public function deleteChemicalDetails($CHEMICAL_DETAIL_ID,$status){
		 
			 $data = array(
			 "CHEMICAL_DETAIL_STATUS" => $status,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("CHEMICAL_DETAIL_ID"=>$CHEMICAL_DETAIL_ID));
			 $this->db->update("fer_chemical_detail",$data);
			 
			return 1;
			 
		 
	 }
	 
	 
	/*WATER SOURCE*/
	 public function insertWaterSource(){
		 $WATER_SOURCE_TYPE = $this->input->post('WATER_SOURCE_TYPE');
		 $check = $this->db->get_where("fer_water_surce",array('WATER_SOURCE_TYPE'=>$WATER_SOURCE_TYPE))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "WATER_SOURCE_TYPE" => $WATER_SOURCE_TYPE,
			 "WATER_SOURCE_STATUS" => 'ACTIVE',
			 "CREATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "CREATED_BY" => $this->session->userdata('EMPLOYEE_ID'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->insert("fer_water_surce",$data);
			 $id = $this->db->insert_id();
			 if($id != null){
				 return 1;
			 }else{
				 return 2;
			 }
		 }else{
			 return 3;
		 }
	 }
	 
	 public function waterSourceList(){
		 return $this->db->get("fer_water_surce")->result_array();
	 }
	 public function waterSourceByID($WATER_SOURCE_ID){
		 return $this->db->get_where("fer_water_surce", array("WATER_SOURCE_ID"=>$WATER_SOURCE_ID))->row();
	 }
	public function updateWaterSource(){
		 $WATER_SOURCE_ID = $this->input->post('WATER_SOURCE_ID');
		 $WATER_SOURCE_TYPE = $this->input->post('WATER_SOURCE_TYPE');
		 $check = $this->db->get_where("fer_water_surce",array('WATER_SOURCE_TYPE'=>$WATER_SOURCE_TYPE, 'WATER_SOURCE_ID !='=>$WATER_SOURCE_ID))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "WATER_SOURCE_TYPE" => $WATER_SOURCE_TYPE,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("WATER_SOURCE_ID"=>$WATER_SOURCE_ID));
			 $this->db->update("fer_water_surce",$data);
			 
			return 1;
			 
		 }else{
			 return 2;
		 }
	 }
	public function deleteWaterSource($WATER_SOURCE_ID,$status){
		 
			 $data = array(
			 "WATER_SOURCE_STATUS" => $status,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("WATER_SOURCE_ID"=>$WATER_SOURCE_ID));
			 $this->db->update("fer_water_surce",$data);
			 
			return 1;
			 
		 
	 }
	 
	 
	/*Irrigation*/
	 public function insertIrrigation(){
		 $IRRIGATION_TYPE = $this->input->post('IRRIGATION_TYPE');
		 $check = $this->db->get_where("fer_irrigation",array('IRRIGATION_TYPE'=>$IRRIGATION_TYPE))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "IRRIGATION_TYPE" => $IRRIGATION_TYPE,
			 "IRRIGATION_STATUS" => 'ACTIVE',
			 "CREATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "CREATED_BY" => $this->session->userdata('EMPLOYEE_ID'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->insert("fer_irrigation",$data);
			 $id = $this->db->insert_id();
			 if($id != null){
				 return 1;
			 }else{
				 return 2;
			 }
		 }else{
			 return 3;
		 }
	 }
	 
	 public function irrigationList(){
		 return $this->db->get("fer_irrigation")->result_array();
	 }
	 public function irrigationByID($IRRIGATION_ID){
		 return $this->db->get_where("fer_irrigation", array("IRRIGATION_ID"=>$IRRIGATION_ID))->row();
	 }
	public function updateIrrigation(){
		 $IRRIGATION_ID = $this->input->post('IRRIGATION_ID');
		 $IRRIGATION_TYPE = $this->input->post('IRRIGATION_TYPE');
		 $check = $this->db->get_where("fer_irrigation",array('IRRIGATION_TYPE'=>$IRRIGATION_TYPE, 'IRRIGATION_ID !='=>$IRRIGATION_ID))->result_array();
		 if(count($check)==0){
			 
			 $data = array(
			 "IRRIGATION_TYPE" => $IRRIGATION_TYPE,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("IRRIGATION_ID"=>$IRRIGATION_ID));
			 $this->db->update("fer_irrigation",$data);
			 
			return 1;
			 
		 }else{
			 return 2;
		 }
	 }
	public function deleteIrrigation($IRRIGATION_ID,$status){
		 
			 $data = array(
			 "IRRIGATION_STATUS" => $status,
			 "UPDATED_DATE_TIME" => date('Y-m-d H:i:s'),
			 "UPDATED_BY" => $this->session->userdata('EMPLOYEE_ID')
			 );
			 $this->db->where(array("IRRIGATION_ID"=>$IRRIGATION_ID));
			 $this->db->update("fer_irrigation",$data);
			 
			return 1;
			 
		 
	 }
	 
	 /*Farmer*/
	 public function farmerList(){
		 $this->db->select("f.*,v.*,m.*,d.*");
		 $this->db->from("fer_farmer as f");
		 $this->db->join("fer_village as v", "v.VILLAGE_ID=f.VILLAGE_ID");
		 $this->db->join("fer_mandal as m", "m.MANDAL_ID=f.MANDAL_ID");
		 $this->db->join("fer_district as d", "d.DISTRICT_ID=f.DISTRICT_ID");
		 $this->db->order_by("f.FARMER_NAME", "ASC");
		 $this->db->where(array("f.FARMER_STATUS"=>"ACTIVE"));
		  return $this->db->get()->result_array();
	 }
	 public function editFarmer($FARMER_ID){
		 $this->db->select("f.*,v.*,m.*,d.*");
		 $this->db->from("fer_farmer as f");
		 $this->db->join("fer_village as v", "v.VILLAGE_ID=f.VILLAGE_ID");
		 $this->db->join("fer_mandal as m", "m.MANDAL_ID=f.MANDAL_ID");
		 $this->db->join("fer_district as d", "d.DISTRICT_ID=f.DISTRICT_ID");
		 $this->db->where(array("f.FARMER_ID"=>$FARMER_ID));
		  return $this->db->get()->row();
	 }
	  public function insertFarmer(){
		  
		  if($_FILES["FARMER_PHOTO"]["name"] != null){
			  $tmpimage = $_FILES["FARMER_PHOTO"]["tmp_name"];
				$random = rand(1, 9);
				$newName = $random."".time();
				$ext = strtolower(pathinfo($_FILES["FARMER_PHOTO"]["name"],PATHINFO_EXTENSION));
				$file = rand(111,999).time().'.'.$ext;
				$target_file = './images/farmerImages/'.$file;
				
				move_uploaded_file($tmpimage, $target_file);
				
		  }else{
			  $file ="";
		  }
			
			$data  = array(
				 "FARMER_NAME" => $this->input->post('FARMER_NAME'),
				 "FARMER_FATHER_NAME" => $this->input->post('FARMER_FATHER_NAME'),
				 "FARMER_MOBILE" => $this->input->post('FARMER_MOBILE'),
				 "FARMER_ADHAAR" => $this->input->post('FARMER_ADHAAR'),
				 "FARMER_PHOTO" => $file,
				 "DISTRICT_ID" => $this->input->post('DISTRICT_ID'),
				 "MANDAL_ID" => $this->input->post('MANDAL_ID'),
				 "VILLAGE_ID" => $this->input->post('VILLAGE_ID'),
				 "ADDRESS" => $this->input->post('ADDRESS'),
				 "FARMER_STATUS" => "ACTIVE"
				 
				 );
				 $this->db->insert("fer_farmer", $data); 
			return 1;
		
		
	 }
	  public function updateFarmer(){
		  
		  if($_FILES["FARMER_NEW_PHOTO"]["name"] != null){
				$tmpimage = $_FILES["FARMER_NEW_PHOTO"]["tmp_name"];
				$random = rand(1, 9);
				$newName = $random."".time();
				$ext = strtolower(pathinfo($_FILES["FARMER_NEW_PHOTO"]["name"],PATHINFO_EXTENSION));
				$file = rand(111,999).time().'.'.$ext;
				$target_file = './images/farmerImages/'.$file;
				
				move_uploaded_file($tmpimage, $target_file);
				
		  }else{
			  $file = $this->input->post('FARMER_PHOTO');
		  }
			
			$data  = array(
				 "FARMER_NAME" => $this->input->post('FARMER_NAME'),
				 "FARMER_FATHER_NAME" => $this->input->post('FARMER_FATHER_NAME'),
				 "FARMER_MOBILE" => $this->input->post('FARMER_MOBILE'),
				 "FARMER_ADHAAR" => $this->input->post('FARMER_ADHAAR'),
				 "FARMER_PHOTO" => $file,
				 "DISTRICT_ID" => $this->input->post('DISTRICT_ID'),
				 "MANDAL_ID" => $this->input->post('MANDAL_ID'),
				 "VILLAGE_ID" => $this->input->post('VILLAGE_ID'),
				 "ADDRESS" => $this->input->post('ADDRESS')
				 
				 );
				 $this->db->where(array("FARMER_ID"=>$this->input->post('FARMER_ID')));
				 $this->db->update("fer_farmer", $data);
		return 1;
	 } 
	 public function deleteFarmer($FARMER_ID){
		 $data = array(
		 "FARMER_STATUS" => "DELETED"
		 );
		 $this->db->where(array("FARMER_ID"=>$FARMER_ID));
		$this->db->update("fer_farmer", $data);
	 }
	 
	 /*Employee*/
	 public function employeeList(){
		  $this->db->select("e.*, sum(p.EMPLOYEE_POINTS) as EMPLOYEE_POINTS");
		 $this->db->from("fer_employee as e");
		 $this->db->join("fer_employee_points as p", "e.EMPLOYEE_ID=p.EMPLOYEE_ID", "LEFT");
		 $this->db->group_by("e.EMPLOYEE_ID");
		 $this->db->order_by("e.EMPLOYEE_NAME", "ASC");
		 $this->db->where(array("e.EMPLOYEE_STATUS"=>"ACTIVE"));
		  return $this->db->get()->result_array();
	 }
	 public function editEmployee($EMPLOYEE_ID){
		 $this->db->select("e.*");
		 $this->db->from("fer_employee as e");
		 $this->db->where(array("e.EMPLOYEE_ID"=>$EMPLOYEE_ID));
		  return $this->db->get()->row();
	 }
	  public function insertEmployee(){
		  $data  = array(
				 "EMPLOYEE_NAME" => $this->input->post('EMPLOYEE_NAME'),
				 "EMPLOYEE_MOBILE" => $this->input->post('EMPLOYEE_MOBILE'),
				 "EMPLOYEE_EMAIL" => $this->input->post('EMPLOYEE_EMAIL'),
				 "EMPLOYEE_ADDRESS" => $this->input->post('EMPLOYEE_ADDRESS'),
				 "EMPLOYEE_USERNAME" => $this->input->post('EMPLOYEE_USERNAME'),
				 "EMPLOYEE_PASSWORD" => $this->input->post('EMPLOYEE_PASSWORD'),
				 "EMPLOYEE_ROLE" => "EMPLOYEE",
				 "EMPLOYEE_STATUS" => "ACTIVE"
				 
				 );
				 $this->db->insert("fer_employee", $data); 
			return 1;
		
		
	 }
	  public function updateEmployee(){
			$data  = array(
				 "EMPLOYEE_NAME" => $this->input->post('EMPLOYEE_NAME'),
				 "EMPLOYEE_MOBILE" => $this->input->post('EMPLOYEE_MOBILE'),
				 "EMPLOYEE_EMAIL" => $this->input->post('EMPLOYEE_EMAIL'),
				 "EMPLOYEE_ADDRESS" => $this->input->post('EMPLOYEE_ADDRESS'),
				 "EMPLOYEE_USERNAME" => $this->input->post('EMPLOYEE_USERNAME'),
				 "EMPLOYEE_PASSWORD" => $this->input->post('EMPLOYEE_PASSWORD')
				 
				 );
				 $this->db->where(array("EMPLOYEE_ID"=>$this->input->post('EMPLOYEE_ID')));
				 $this->db->update("fer_employee", $data);
		return 1;
	 }
	  public function deleteEmployee($EMPLOYEE_ID){
		 $data = array(
		 "EMPLOYEE_STATUS" => "DELETED"
		 );
		 $this->db->where(array("EMPLOYEE_ID"=>$EMPLOYEE_ID));
		$this->db->update("fer_employee", $data);
	 }
	 
	 public function employeePoints($EMPLOYEE_ID){
		 $this->db->select("e.*, sum(p.EMPLOYEE_POINTS) as EMPLOYEE_POINTS");
		 $this->db->from("fer_employee as e");
		 $this->db->join("fer_employee_points as p", "p.EMPLOYEE_ID=e.EMPLOYEE_ID", "LEFT");
		 $this->db->where(array("e.EMPLOYEE_ID"=>$EMPLOYEE_ID));
		return $this->db->get()->row();
	 }
	 public function addPoints(){
		$data = array(
		"EMPLOYEE_ID" => $this->input->post('EMPLOYEE_ID'),
		"EMPLOYEE_POINTS" => $this->input->post('EMPLOYEE_POINTS'),
		"REMARKS" => $this->input->post('REMARKS'),
		"GIVEN_BY" => $this->session->userdata('EMPLOYEE_ID'),
		"GIVEN_DATE_TIME" => date('Y-m-d H:i:s')
		);
		$this->db->insert("fer_employee_points", $data);
	 }
	 
	 public function employeePointsList($EMPLOYEE_ID){
		 $this->db->select("e.*,p.*");
		 $this->db->from("fer_employee_points as p");
		 $this->db->join("fer_employee as e", "p.GIVEN_BY=e.EMPLOYEE_ID", "LEFT");
		 $this->db->where(array("p.EMPLOYEE_ID"=>$EMPLOYEE_ID));
		return $this->db->get()->result_array();
	 }
	 
	 /*Crop Category*/
	 public function cropCategoryList(){
		  return $this->db->get("fer_crop_category")->result_array();
	 }
	 
	 /*District*/
	 public function districtList(){
		  return $this->db->get("fer_district")->result_array();
	 }
	 /*Crop Category Detail*/
	 public function getCropCategoryDetailByCategoryID($CROP_CATEGORY_ID){
		$this->db->order_by("CROP_CATEGORY_DETAIL_NAME", "ASC");
		  return $this->db->get_where("fer_crop_category_detail", array("CROP_CATEGORY_ID"=>$CROP_CATEGORY_ID))->result_array();
	 }
	 /*Chemical Detail*/
	 public function getChemicalDetails($CHEMICAL_ID){
		$this->db->order_by("CHEMICAL_DETAIL_NAME", "ASC");
		  return $this->db->get_where("fer_chemical_detail", array("CHEMICAL_ID"=>$CHEMICAL_ID))->result_array();
	 }
	 /*Mandal*/
	 public function getMandalByID($DISTRICT_ID){
		 $this->db->order_by("MANDAL_NAME", "ASC");
		  return $this->db->get_where("fer_mandal", array("DISTRICT_ID"=>$DISTRICT_ID))->result_array();
	 }
	 /*Village*/
	 public function getVillageByID($MANDAL_ID){
		 $this->db->order_by("VILLAGE_NAME", "ASC");
		  return $this->db->get_where("fer_village", array("MANDAL_ID"=>$MANDAL_ID))->result_array();
	 }
	 
	 
	 /*Crop*/
	 public function cropList(){
		 $this->db->select("c.*, f.*, i.*, s.*, w.*, ccd.*, cc.*, v.*,e.*");
		 $this->db->from("fer_crop as c");
		 $this->db->join("fer_farmer as f", "f.FARMER_ID=c.FARMER_ID", "LEFT");
		 $this->db->join("fer_irrigation as i", "i.IRRIGATION_ID=c.IRRIGATION_ID", "LEFT");
		 $this->db->join("fer_soil as s", "s.SOIL_ID=c.SOIL_ID", "LEFT");
		 $this->db->join("fer_water_surce as w", "w.WATER_SOURCE_ID=c.CROP_WATER_SOURCE_ID", "LEFT");
		 $this->db->join("fer_crop_category_detail as ccd", "ccd.CROP_CATEGORY_DETAIL_ID=c.CROP_CATEGORY_DETAIL_ID", "LEFT");
		 $this->db->join("fer_crop_category as cc", "cc.CROP_CATEGORY_ID=ccd.CROP_CATEGORY_ID", "LEFT");
		 $this->db->join("fer_village as v", "v.VILLAGE_ID=c.VILLAGE_ID", "LEFT");
		 $this->db->join("fer_employee as e", "e.EMPLOYEE_ID=c.CREATED_EMPLOYEE_ID", "LEFT");
		// $this->db->where("");
		$this->db->order_by("c.CROP_ID", "DESC");
		 return $this->db->get()->result_array();
	 }
	 
	 // Crop Remarks
	 public function cropRemarks($CROP_ID){
		 $this->db->select("r.*, e.*, c.CHEMICAL_NAME, cd.CHEMICAL_DETAIL_NAME");
		 $this->db->from("fer_crop_remarks as r");
		 $this->db->join("fer_employee as e", "e.EMPLOYEE_ID=r.EMPLOYEE_ID", "LEFT");
		 $this->db->join("fer_chemical as c", "c.CHEMICAL_ID=r.CHEMICAL_ID", "LEFT");
		 $this->db->join("fer_chemical_detail as cd", "cd.CHEMICAL_DETAIL_ID=r.CHEMICAL_DETAIL_ID", "LEFT");
		  $this->db->where(array("r.CROP_ID"=>$CROP_ID));
		  $this->db->order_by("r.CROP_REMARK_ID", "DESC");
		  return $this->db->get()->result_array();
	 }
	 // Crop Images
	 public function cropImages($CROP_ID){
		 $this->db->order_by("CROP_IMAGE_ID", "DESC");
		  return $this->db->get_where("fer_crop_images", array("CROP_ID"=>$CROP_ID))->result_array();
	 }
	 
	 public function cropDetailsByID($CROP_ID){
		 $this->db->select("c.*, f.*, i.*, s.*, w.*, ccd.*, cc.*, v.*, m.*, d.*");
		 $this->db->from("fer_crop as c");
		 $this->db->join("fer_farmer as f", "f.FARMER_ID=c.FARMER_ID");
		 $this->db->join("fer_irrigation as i", "i.IRRIGATION_ID=c.IRRIGATION_ID");
		 $this->db->join("fer_soil as s", "s.SOIL_ID=c.SOIL_ID");
		 $this->db->join("fer_water_surce as w", "w.WATER_SOURCE_ID=c.CROP_WATER_SOURCE_ID");
		 $this->db->join("fer_crop_category_detail as ccd", "ccd.CROP_CATEGORY_DETAIL_ID=c.CROP_CATEGORY_DETAIL_ID");
		 $this->db->join("fer_crop_category as cc", "cc.CROP_CATEGORY_ID=ccd.CROP_CATEGORY_ID");
		 $this->db->join("fer_village as v", "v.VILLAGE_ID=c.VILLAGE_ID");
		 $this->db->join("fer_mandal as m", "m.MANDAL_ID=v.MANDAL_ID");
		 $this->db->join("fer_district as d", "d.DISTRICT_ID=m.DISTRICT_ID");
		$this->db->where(array("c.CROP_ID"=>$CROP_ID));
		$this->db->order_by("c.CROP_ID", "DESC");
		 return $this->db->get()->row();
	 }
	 
	 public function insertCrop(){
		 $data  = array(
		 "FARMER_ID" => $this->input->post('FARMER_ID'),
		 "CROP_SOWING_DATE" => date('Y-m-d', strtotime($this->input->post('CROP_SOWING_DATE'))),
		 "CROP_SEED_VERITY" => $this->input->post('CROP_SEED_VERITY'),
		 "CROP_AREA" => $this->input->post('CROP_AREA'),
		 "IRRIGATION_ID" => $this->input->post('IRRIGATION_ID'),
		 "CROP_CATEGORY_DETAIL_ID" => $this->input->post('CROP_CATEGORY_DETAIL_ID'),
		 "CREATED_EMPLOYEE_ID" => $this->session->userdata('EMPLOYEE_ID'),
		 "PREVIOUS_CROP" => $this->input->post('PREVIOUS_CROP'),
		 "SOIL_ID" => $this->input->post('SOIL_ID'),
		 "CROP_STATUS" => 'ACTIVE',
		 "CROP_WATER_SOURCE_ID" => $this->input->post('CROP_WATER_SOURCE_ID'),
		 "VILLAGE_ID" => $this->input->post('VILLAGE_ID')
		 );
		 $this->db->insert("fer_crop", $data);
		 $CROP_ID = $this->db->insert_id();
		 
		 $remarksData = array(
		 "CROP_ID"=>$CROP_ID,
		 "CHEMICAL_ID"=>$this->input->post('CHEMICAL_ID'),
		 "CHEMICAL_DETAIL_ID"=>$this->input->post('CHEMICAL_DETAIL_ID'),
		 "CROP_REMARK_DATE"=>date('Y-m-d H:i:s'),
		 "CROP_REMARK_DATA"=>$this->input->post('CROP_REMARK_DATA'),
		 "EMPLOYEE_ID"=>$this->session->userdata('EMPLOYEE_ID'),
		 "CROP_REMARK_STATUS"=>"ACTIVE",
		 "CROP_REMARK_LAST_UPDATED"=>date('Y-m-d H:i:s')
		 );
		 if($this->input->post('CROP_REMARK_DATA') !=""){
			 $this->db->insert("fer_crop_remarks", $remarksData);
		 }
		 $i=0; 
		foreach($_FILES["cropImages"]["tmp_name"] as $tmpimage) {
			
			$random = rand(1, 9);
			$newName = $random."".time();
			$ext = strtolower(pathinfo($_FILES["cropImages"]["name"][$i],PATHINFO_EXTENSION));
			$file = rand(111,999).time().'.'.$ext;
			$target_file = './images/'.$file;
			
			if(move_uploaded_file($tmpimage, $target_file)) {
				$fileName[] = $target_file;
				$imageData = array(
				"CROP_ID" =>$CROP_ID,
				"CROP_IMAGE" =>$file,
				"CROP_IMAGE_STATUS"=>'ACTIVE'
				);
				$this->db->insert("fer_crop_images", $imageData);
			}
		 $i++;   
		}
		if($CROP_ID != NULL){
			return 1;
		}else{
			return 2;
		}
		
		
	 }
	 
	 public function editCrop($CROP_ID){
		 $this->db->select("c.*, f.*, i.*, s.*, w.*, ccd.*, cc.*, v.*, m.*, d.*");
		 $this->db->from("fer_crop as c");
		 $this->db->join("fer_farmer as f", "f.FARMER_ID=c.FARMER_ID");
		 $this->db->join("fer_irrigation as i", "i.IRRIGATION_ID=c.IRRIGATION_ID");
		 $this->db->join("fer_soil as s", "s.SOIL_ID=c.SOIL_ID");
		 $this->db->join("fer_water_surce as w", "w.WATER_SOURCE_ID=c.CROP_WATER_SOURCE_ID");
		 $this->db->join("fer_crop_category_detail as ccd", "ccd.CROP_CATEGORY_DETAIL_ID=c.CROP_CATEGORY_DETAIL_ID");
		 $this->db->join("fer_crop_category as cc", "cc.CROP_CATEGORY_ID=ccd.CROP_CATEGORY_ID");
		 $this->db->join("fer_village as v", "v.VILLAGE_ID=c.VILLAGE_ID");
		 $this->db->join("fer_mandal as m", "m.MANDAL_ID=v.MANDAL_ID");
		 $this->db->join("fer_district as d", "d.DISTRICT_ID=m.DISTRICT_ID");
		$this->db->where(array("c.CROP_ID"=>$CROP_ID));
		$this->db->order_by("c.CROP_ID", "DESC");
		 return $this->db->get()->row();
	 }
	 public function updateCrop(){
		 $CROP_ID = $this->input->post('CROP_ID');
		$CROP_SOWING_DATE = str_replace("/", "-", $this->input->post('CROP_SOWING_DATE'));
		
		$data  = array(
		 "FARMER_ID" => $this->input->post('FARMER_ID'),
		 "CROP_SOWING_DATE" => date('Y-m-d', strtotime($CROP_SOWING_DATE)),
		 "CROP_SEED_VERITY" => $this->input->post('CROP_SEED_VERITY'),
		 "CROP_AREA" => $this->input->post('CROP_AREA'),
		 "IRRIGATION_ID" => $this->input->post('IRRIGATION_ID'),
		 "CROP_CATEGORY_DETAIL_ID" => $this->input->post('CROP_CATEGORY_DETAIL_ID'),
		 "CREATED_EMPLOYEE_ID" => $this->session->userdata('EMPLOYEE_ID'),
		 "PREVIOUS_CROP" => $this->input->post('PREVIOUS_CROP'),
		 "SOIL_ID" => $this->input->post('SOIL_ID'),
		 "CROP_WATER_SOURCE_ID" => $this->input->post('CROP_WATER_SOURCE_ID'),
		 "VILLAGE_ID" => $this->input->post('VILLAGE_ID')
		 );
			$this->db->where(array("CROP_ID"=>$CROP_ID)); 
			$this->db->update("fer_crop", $data); 
			return 1;
		 
	 }
	 
	 public function insertRemarks(){
		 
		 $CROP_ID = $this->input->post('CROP_ID');
		 $remarksData = array(
		 "CROP_ID"=>$CROP_ID,
		 "CHEMICAL_ID"=>$this->input->post('CHEMICAL_ID'),
		 "CHEMICAL_DETAIL_ID"=>$this->input->post('CHEMICAL_DETAIL_ID'),
		 "CROP_REMARK_DATE"=>date('Y-m-d H:i:s'),
		 "CROP_REMARK_DATA"=>$this->input->post('CROP_REMARK_DATA'),
		 "EMPLOYEE_ID"=>$this->session->userdata('EMPLOYEE_ID'),
		 "CROP_REMARK_STATUS"=>"ACTIVE",
		 "CROP_REMARK_LAST_UPDATED"=>date('Y-m-d H:i:s')
		 );
		 $this->db->insert("fer_crop_remarks", $remarksData);
		 return 1;
	 }
	 public function insertImages(){
		 
		 $CROP_ID = $this->input->post('CROP_ID');
		  $i=0; 
		foreach($_FILES["cropImages"]["tmp_name"] as $tmpimage) {
			
			$random = rand(1, 9);
			$newName = $random."".time();
			$ext = strtolower(pathinfo($_FILES["cropImages"]["name"][$i],PATHINFO_EXTENSION));
			$file = rand(111,999).time().'.'.$ext;
			$target_file = './images/'.$file;
			
			if(move_uploaded_file($tmpimage, $target_file)) {
				$fileName[] = $target_file;
				$imageData = array(
				"CROP_ID" =>$CROP_ID,
				"CROP_IMAGE" =>$file,
				"CROP_IMAGE_STATUS"=>'ACTIVE'
				);
				$this->db->insert("fer_crop_images", $imageData);
			}
		 $i++;   
		}
		return 1;
	 }
	 
	
}
