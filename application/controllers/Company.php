<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Company extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Company/";
		 $data['Controller_name'] = "Company Information";
	
// =============================================fix data ends here====================================================
		 $con['conditions'] = array('owner_name' =>  $this->session->userdata['distributor']); 
		 $data['company'] = $this->common->get_single_row("Company",$con);

		
		$this->load->view("Company/add_company.php",$data);
	}


	public function add(){


// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Company/";
		 $data['Controller_name'] = "Company Information";
	
// =============================================fix data ends here====================================================


		if(isset($_POST['submit'])){

		
			$bznzname = htmlspecialchars($this->input->post("businessname"));
			$address = htmlspecialchars($this->input->post("address"));
			$lat = ($this->input->post("lat"));
			$long = ($this->input->post("long"));
			$c_id = $this->input->post("c_id");

			$array = array('bznzname' => $bznzname,'owner_name' => $this->session->userdata['companyid'],'address' => $address,'lat' => $lat,'long' => $long);

			if($c_id == 0){
				$query = $this->db->insert("Company",$array);
				
			}else{
			    
			    $con['conditions'] = array('c_id' =>  $c_id); 
				$query = $this->db->update("Company",$array);

		    }

			if($query){
				
				$this->session->set_flashdata('success','Company Information added Successfully');
			}else{
				$this->session->set_flashdata('fail','Try Again Later');
			}

	    }
	    redirect("/Company");
	}

		

	

}
?>