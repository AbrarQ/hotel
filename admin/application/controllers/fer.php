<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('FerModel');
		error_reporting(0);
		if($this->session->userdata('EMPLOYEE_ID') == null)
		{
			redirect(base_url()."index.php", 'refresh');
		}
	}
	public function index()
	{
		$data['employeeList'] = $this->FerModel->employeeList();
		$data['farmerList'] = $this->FerModel->farmerList();
		$data['cropList'] = $this->FerModel->cropList();
		$this->load->view('dashboard', $data);
	}
	
	/*Farmer*/
	public function farmer()
	{
		$data['farmerList'] = $this->FerModel->farmerList();
		$this->load->view('farmer', $data);
	}
	public function addFarmer()
	{
		$data['districtList'] = $this->FerModel->districtList();
		$this->load->view('addFarmer', $data);
	}
	
	public function insertFarmer()
	{
		$res = $this->FerModel->insertFarmer();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/farmer');
		}else if($res == 2){
			//Image  Not Uploaded
			$this->load->view('addFarmer');
		}else{
			//Something went wrong
			$this->load->view('addFarmer');
		}
	}
	
	public function editFarmer($FARMER_ID)
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			$data['farmer'] = $this->FerModel->editFarmer($FARMER_ID);
		$data['districtList'] = $this->FerModel->districtList();
		$data['mandalList'] = $this->FerModel->getMandalByID($data['farmer']->DISTRICT_ID);
		$data['villageList'] = $this->FerModel->getVillageByID($data['farmer']->MANDAL_ID);
		$this->load->view('editFarmer', $data);
		}
		
	}
	
	
	public function updateFarmer()
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			$res = $this->FerModel->updateFarmer();
			if($res == 1){
				//Successfully Inserted
				redirect(base_url().'/index.php/fer/farmer');
			}else if($res == 2){
				//Image  Not Uploaded
				redirect(base_url().'/index.php/fer/editFarmer/'.$this->input->post('FARMER_ID'));
			}else{
				//Something went wrong
				redirect(base_url().'/index.php/fer/editFarmer/'.$this->input->post('FARMER_ID'));
			}
		}
	}
	public function deleteFarmer($FARMER_ID)
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			
			$res = $this->FerModel->deleteFarmer($FARMER_ID);
			
			if($res == 1){
				//Successfully Inserted
				redirect(base_url().'/index.php/fer/farmer');
			}else{
				//Something went wrong
				redirect(base_url().'/index.php/fer/farmer');
			}
		}
	}
	
	/*Employee*/
	public function employee()
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			$data['employeeList'] = $this->FerModel->employeeList();
			$this->load->view('employee', $data);
		}
	}
	public function addEmployee()
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			$this->load->view('addEmployee', $data);
		}
	}
	
	public function insertEmployee()
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			$res = $this->FerModel->insertEmployee();
			if($res == 1){
				//Successfully Inserted
				redirect(base_url().'/index.php/fer/employee');
			}else if($res == 2){
				//Image  Not Uploaded
				$this->load->view('addEmployee');
			}else{
				//Something went wrong
				$this->load->view('addEmployee');
			}
		}
	}
	
	public function editEmployee($EMPLOYEE_ID)
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			$data['employee'] = $this->FerModel->editEmployee($EMPLOYEE_ID);
			$this->load->view('editEmployee', $data);
		}
	}
	public function deleteEmployee($EMPLOYEE_ID)
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			
			$res = $this->FerModel->deleteEmployee($EMPLOYEE_ID);
			
			if($res == 1){
				//Successfully Inserted
				redirect(base_url().'/index.php/fer/employee');
			}else{
				//Something went wrong
				redirect(base_url().'/index.php/fer/employee');
			}
		}
	}
	
	
	public function updateEmployee()
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			
			$res = $this->FerModel->updateEmployee();
			if($res == 1){
				//Successfully Inserted
				redirect(base_url().'/index.php/fer/employee');
			}else if($res == 2){
				//Image  Not Uploaded
				redirect(base_url().'/index.php/fer/editEmployee/'.$this->input->post('EMPLOYEE_ID'));
			}else{
				//Something went wrong
				redirect(base_url().'/index.php/fer/editEmployee/'.$this->input->post('EMPLOYEE_ID'));
			}
		}
	}
	
	public function employeePoints($EMPLOYEE_ID){
		$data['employeePoints'] = $this->FerModel->employeePointsList($EMPLOYEE_ID);
		$data['employee'] = $this->FerModel->employeePoints($EMPLOYEE_ID);
		$this->load->view('employeePoints', $data);
	}
	public function addPoints(){
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			$res = $this->FerModel->addPoints();
			if($res == 1){
				//Successfully Inserted
				redirect(base_url().'/index.php/fer/employee');
			}else{
				//Something went wrong
				redirect(base_url().'/index.php/fer/employee');
			}
		}
	}
	
	/*crop*/
	public function crop()
	{
		$data['cropList'] = $this->FerModel->cropList();
		$this->load->view('crop', $data);
	}
	public function addCrop()
	{	
		$data['farmerList'] = $this->FerModel->farmerList();
		$data['chemicalList'] = $this->FerModel->chemicalList();
		$data['soilList'] = $this->FerModel->soilList();
		$data['waterSourceList'] = $this->FerModel->waterSourceList();
		$data['irrigationList'] = $this->FerModel->irrigationList();
		$data['cropCategoryList'] = $this->FerModel->cropCategoryList();
		$data['districtList'] = $this->FerModel->districtList();
		$this->load->view('addCrop', $data);
	}
	public function cropDetails($CROP_ID)
	{
		$data['cropRemarks'] = $this->FerModel->cropRemarks($CROP_ID);
		$data['chemicalList'] = $this->FerModel->chemicalList();
		$data['cropImages'] = $this->FerModel->cropImages($CROP_ID);
		$data['cropDetails'] = $this->FerModel->cropDetailsByID($CROP_ID);
		$this->load->view('cropDetails', $data);
	}
	public function insertCrop()
	{
		$res = $this->FerModel->insertCrop();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/crop');
		}else if($res == 2){
			//Something went wrong
			$this->load->view('addCrop');
		}else if($res == 3){
			//Duplicate
			$this->load->view('addCrop');
		}else{
			//Something went wrong
			$this->load->view('addCrop');
		}
	}
	public function editCrop($CROP_ID)
	{
		if($this->session->userdata('EMPLOYEE_ROLE') != 'ADMIN')
		{
			$this->load->view('noPermission', $data);
		}else{
			
			$data['cropDetails'] = $this->FerModel->editCrop($CROP_ID);
			$data['farmerList'] = $this->FerModel->farmerList();
			$data['chemicalList'] = $this->FerModel->chemicalList();
			$data['soilList'] = $this->FerModel->soilList();
			$data['waterSourceList'] = $this->FerModel->waterSourceList();
			$data['irrigationList'] = $this->FerModel->irrigationList();
			$data['cropCategoryList'] = $this->FerModel->cropCategoryList();
			$data['cropCategoryDetailList'] = $this->FerModel->getCropCategoryDetailByCategoryID($data['cropDetails']->CROP_CATEGORY_ID);
			$data['districtList'] = $this->FerModel->districtList();
			$data['mandalList'] = $this->FerModel->getMandalByID($data['cropDetails']->DISTRICT_ID);
			$data['villageList'] = $this->FerModel->getVillageByID($data['cropDetails']->MANDAL_ID);
			$this->load->view('editCrop', $data);
		}
	}
	public function updateCrop()
	{
		$res = $this->FerModel->updateCrop();
		if($res == 1){
			//Successfully Updated
			redirect(base_url().'/index.php/fer/crop');
		}else if($res == 2){
			//Duplicate
			redirect(base_url().'/index.php/fer/editCrop/'.$this->input->post('CROP_ID'));
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/editCrop/'.$this->input->post('CROP_ID'));
		}
		
	}
	public function insertRemarks()
	{
		$res = $this->FerModel->insertRemarks();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/cropDetails/'.$this->input->post('CROP_ID'));
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/cropDetails/'.$this->input->post('CROP_ID'));
		}
	}
	
	public function insertImages()
	{
		$res = $this->FerModel->insertImages();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/cropDetails/'.$this->input->post('CROP_ID'));
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/cropDetails/'.$this->input->post('CROP_ID'));
		}
	}
	
	/*Soil*/
	public function soil()
	{
		$data['soilList'] = $this->FerModel->soilList();
		$this->load->view('soil', $data);
	}
	public function addSoil()
	{
		$this->load->view('addSoil');
	}
	
	public function insertSoil()
	{
		$res = $this->FerModel->insertSoil();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/soil');
		}else if($res == 2){
			//Something went wrong
			$this->load->view('addSoil');
		}else if($res == 3){
			//Duplicate
			$this->load->view('addSoil');
		}else{
			//Something went wrong
			$this->load->view('addSoil');
		}
	}
	public function editSoil($SOIL_ID)
	{
		$data['soil'] = $this->FerModel->soilByID($SOIL_ID);
		$this->load->view('editsoil', $data);
	}
	public function updateSoil()
	{
		$res = $this->FerModel->updateSoil();
		if($res == 1){
			//Successfully Updated
			redirect(base_url().'/index.php/fer/soil');
		}else if($res == 2){
			//Duplicate
			redirect(base_url().'/index.php/fer/editSoil/'.$this->input->post('SOIL_ID'));
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/editSoil/'.$this->input->post('SOIL_ID'));
		}
		
	}
	public function deleteSoil($SOIL_ID,$status)
	{
		$res = $this->FerModel->deleteSoil($SOIL_ID,$status);
		if($res == 1){
			//Successfully deleted
			redirect(base_url().'/index.php/fer/soil');
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/soil');
		}
	}
	
	
	/*Water Source*/
	public function waterSource()
	{
		$data['waterSourceList'] = $this->FerModel->waterSourceList();
		$this->load->view('waterSource', $data);
	}
	public function addWaterSource()
	{
		$this->load->view('addWaterSource');
	}
	
	public function insertWaterSource()
	{
		$res = $this->FerModel->insertWaterSource();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/waterSource');
		}else if($res == 2){
			//Something went wrong
			$this->load->view('addWaterSource');
		}else if($res == 3){
			//Duplicate
			$this->load->view('addWaterSource');
		}else{
			//Something went wrong
			$this->load->view('addWaterSource');
		}
	}
	public function editWaterSource($WATER_SOURCE_ID)
	{
		$data['waterSource'] = $this->FerModel->waterSourceByID($WATER_SOURCE_ID);
		$this->load->view('editWaterSource', $data);
	}
	public function updateWaterSource()
	{
		$res = $this->FerModel->updateWaterSource();
		if($res == 1){
			//Successfully Updated
			redirect(base_url().'/index.php/fer/waterSource');
		}else if($res == 2){
			//Duplicate
			redirect(base_url().'/index.php/fer/editWaterSource/'.$this->input->post('WATER_SOURCE_ID'));
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/editWaterSource/'.$this->input->post('WATER_SOURCE_ID'));
		}
		
	}
	public function deleteWaterSource($WATER_SOURCE_ID,$status)
	{
		$res = $this->FerModel->deleteWaterSource($WATER_SOURCE_ID,$status);
		if($res == 1){
			//Successfully deleted
			redirect(base_url().'/index.php/fer/waterSource');
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/waterSource');
		}
	}
	
	
	/*Irrigation*/
	public function irrigation()
	{
		$data['irrigationList'] = $this->FerModel->irrigationList();
		$this->load->view('irrigation', $data);
	}
	public function addIrrigation()
	{
		$this->load->view('addIrrigation');
	}
	
	public function insertIrrigation()
	{
		$res = $this->FerModel->insertIrrigation();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/irrigation');
		}else if($res == 2){
			//Something went wrong
			$this->load->view('addIrrigation');
		}else if($res == 3){
			//Duplicate
			$this->load->view('addIrrigation');
		}else{
			//Something went wrong
			$this->load->view('addIrrigation');
		}
	}
	public function editIrrigation($WATER_SOURCE_ID)
	{
		$data['irrigation'] = $this->FerModel->IrrigationByID($WATER_SOURCE_ID);
		$this->load->view('editIrrigation', $data);
	}
	public function updateIrrigation()
	{
		$res = $this->FerModel->updateIrrigation();
		if($res == 1){
			//Successfully Updated
			redirect(base_url().'/index.php/fer/irrigation');
		}else if($res == 2){
			//Duplicate
			redirect(base_url().'/index.php/fer/editIrrigation/'.$this->input->post('IRRIGATION_ID'));
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/editIrrigation/'.$this->input->post('IRRIGATION_ID'));
		}
		
	}
	public function deleteIrrigation($IRRIGATION_ID,$status)
	{
		$res = $this->FerModel->deleteIrrigation($IRRIGATION_ID,$status);
		if($res == 1){
			//Successfully deleted
			redirect(base_url().'/index.php/fer/irrigation');
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/irrigation');
		}
	}
	
	/*Crop Category Detail*/
	public function getCropCategoryDetailByCategoryID($CROP_CATEGORY_ID){
		$cropCategoryDetail = $this->FerModel->getCropCategoryDetailByCategoryID($CROP_CATEGORY_ID);
		echo json_encode($cropCategoryDetail);
	}
	/*Chemcial Details*/
	public function getChemicalDetails($CHEMICAL_ID){
		$chemicalDetails = $this->FerModel->getChemicalDetails($CHEMICAL_ID);
		echo json_encode($chemicalDetails);
	}
	
	/*Mandal*/
	public function getMandalByID($DISTRICT_ID){
		$mandal = $this->FerModel->getMandalByID($DISTRICT_ID);
		echo json_encode($mandal);
	}
	/*Village*/
	public function getVillageByID($MANDAL_ID){
		$village = $this->FerModel->getVillageByID($MANDAL_ID);
		echo json_encode($village);
	}
	
	public function noPermission()
	{
		$this->load->view('noPermission');
	}
	
	public function myAccount()
	{
		$EMPLOYEE_ID  = $this->session->userdata('EMPLOYEE_ID');
		$data['employee'] = $this->FerModel->editEmployee($EMPLOYEE_ID);
		$this->load->view('myAccount', $data);
	}
	public function updateProfile()
	{
		$res = $this->FerModel->updateEmployee();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/myAccount');
		}else if($res == 2){
			//Image  Not Uploaded
			redirect(base_url().'/index.php/fer/myAccount/');
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/myAccount/');
		}
		
	}
	
	/*Chemical*/
	public function chemical()
	{
		$data['chemicalList'] = $this->FerModel->chemicalList();
		$this->load->view('chemical', $data);
	}
	public function addChemical()
	{
		$this->load->view('addChemical');
	}
	
	public function insertChemical()
	{
		$res = $this->FerModel->insertChemical();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/chemical');
		}else if($res == 2){
			//Something went wrong
			$this->load->view('addChemical');
		}else if($res == 3){
			//Duplicate
			$this->load->view('addChemical');
		}else{
			//Something went wrong
			$this->load->view('addChemical');
		}
	}
	public function editChemical($CHEMICAL_ID)
	{
		$data['chemical'] = $this->FerModel->chemicalByID($CHEMICAL_ID);
		$this->load->view('editChemical', $data);
	}
	public function updateChemical()
	{
		$res = $this->FerModel->updateChemicall();
		if($res == 1){
			//Successfully Updated
			redirect(base_url().'/index.php/fer/chemical');
		}else if($res == 2){
			//Duplicate
			redirect(base_url().'/index.php/fer/editChemical/'.$this->input->post('CHEMICAL_ID'));
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/editChemical/'.$this->input->post('CHEMICAL_ID'));
		}
		
	}
	public function deleteChemical($CHEMICAL_ID,$status)
	{
		$res = $this->FerModel->deleteChemical($CHEMICAL_ID,$status);
		if($res == 1){
			//Successfully deleted
			redirect(base_url().'/index.php/fer/chemical');
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/chemical');
		}
	}
	
	/*Chemical Details*/
	public function chemicalDetails()
	{
		$data['chemical'] = $this->FerModel->chemicalList();
		$data['chemicalDetailsList'] = $this->FerModel->chemicalDetailsList();
		$this->load->view('chemicalDetails', $data);
	}
	public function addChemicalDetails()
	{
		$data['chemicalList'] = $this->FerModel->chemicalList();
		$this->load->view('addChemicalDetails',$data);
	}
	
	public function insertChemicalDetails()
	{
		$res = $this->FerModel->insertChemicalDetails();
		if($res == 1){
			//Successfully Inserted
			redirect(base_url().'/index.php/fer/chemicalDetails');
		}else if($res == 2){
			//Something went wrong
			$this->load->view('addChemicalDetails');
		}else if($res == 3){
			//Duplicate
			$this->load->view('addChemicalDetails');
		}else{
			//Something went wrong
			$this->load->view('addChemicalDetails');
		}
	}
	public function editChemicalDetails($CHEMICAL_DETAIL_ID)
	{
		$data['chemicalDetails'] = $this->FerModel->chemicalDetailsByID($CHEMICAL_DETAIL_ID);
		$this->load->view('editChemicalDetails', $data);
	}
	public function updateChemicalDetails()
	{
		$res = $this->FerModel->updateChemicalDetails();
		if($res == 1){
			//Successfully Updated
			redirect(base_url().'/index.php/fer/chemicalDetails');
		}else if($res == 2){
			//Duplicate
			redirect(base_url().'/index.php/fer/editChemicalDetails/'.$this->input->post('CHEMICAL_DETAIL_ID'));
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/editChemical/'.$this->input->post('CHEMICAL_DETAIL_ID'));
		}
		
	}
	public function deleteChemicalDetails($CHEMICAL_DETAIL_ID,$status)
	{
		$res = $this->FerModel->deleteChemicalDetails($CHEMICAL_DETAIL_ID,$status);
		if($res == 1){
			//Successfully deleted
			redirect(base_url().'/index.php/fer/chemicalDetails');
		}else{
			//Something went wrong
			redirect(base_url().'/index.php/fer/chemicalDetails');
		}
	}
}
