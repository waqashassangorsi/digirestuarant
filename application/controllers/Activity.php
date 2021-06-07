<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Activity extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Activity/";
		 $data['Controller_name'] = "All Activities";
	
// =============================================fix data ends here====================================================
		 $data['end_date'] = date("Y-m-d"); 
		 $data['start_date'] = date("Y-m-d", strtotime("-15 days", time()));

		 if(!empty($this->input->post("start_Date")) && !empty($this->input->post("end_Date"))){
		 	$data['start_date'] = $this->input->post("start_Date");
		 	$data['end_date'] = $this->input->post("end_Date");
		 }


		 	$this->db->select('*');
			$this->db->from('activity');
			$this->db->where('act_date >=',$data["start_date"]);
			$this->db->where('act_date <=',$data["end_date"]);
			$this->db->where('company_id =',$this->session->userdata['companyid']);

			$result = $this->db->get();

			$data['Activity'] = $result->result_array();
		 
			 $this->load->view("Activity/Activity",$data);
	}

		

	

}
?>