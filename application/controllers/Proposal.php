<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Proposal extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Proposal/";
		 $data['Controller_name'] = "All Proposal";
		 $data['Newcaption'] = "All Proposal";
// =============================================fix data ends here====================================================

		 $data['proposals'] = $this->db->query("select msgs.*,users.*,jobs.* from msgs inner join users on users.u_id=msgs.send_id inner join jobs on jobs.job_id=msgs.job_id where proposal_Status !=''")->result_array();
         //echo "<pre>";var_dump( $data['freelancers']);

		 $this->load->view("Proposal.php",$data);
	}

	public function jobproposals($id){ 
		
	// =============================================fix data starts here====================================================
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Proposal/";
		$data['Controller_name'] = "All Proposal";
		$data['Newcaption'] = "All Proposal";
	// =============================================fix data ends here====================================================
	
		$data['proposals'] = $this->db->query("select msgs.*,users.*,jobs.* from msgs inner join users on users.u_id=msgs.send_id inner join jobs on jobs.job_id=msgs.job_id where msgs.job_id='$id' and proposal_Status !=''")->result_array();
		//echo "<pre>";var_dump( $data['proposals']);

		$this->load->view("Proposal.php",$data);
	}


	public function proposaldetails($id){ 
		
		// =============================================fix data starts here====================================================
			$data['user'] = $this->check->Login(); 
			$data['Controller_url'] = "Proposal/";
			$data['Controller_name'] = "Proposal Detail";
			$data['Newcaption'] = "Proposal Detail";
		// =============================================fix data ends here====================================================
		
			$con['conditions'] = array();
			$data['record'] = $this->db->query("select msgs.*,users.*,jobs.* from msgs inner join users on users.u_id=msgs.send_id inner join jobs on jobs.job_id=msgs.job_id where msg_id='$id'")->result_array()[0];
			//echo "<pre>";var_dump( $data['proposals']);
	
			$this->load->view("Proposaldetails.php",$data);
		}	
	

}
?>