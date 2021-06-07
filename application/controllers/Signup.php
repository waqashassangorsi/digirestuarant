<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('common');
	}

	public function index()
	{
		if($this->session->userdata('LoggedIn')){
			redirect("Dashboard");
		}

		$data = "";

		if(!empty($this->input->post("ownername"))){

			$ownername = $this->input->post("ownername"); 
			$email = $_POST['email'];
			$password  = ($_POST['password']);
			$re_password  = $_POST['re-password'];

			if(!empty($ownername) && !empty($email) && !empty($password)){

			if($password == $re_password){

				$con['conditions'] = array("email"=>$email);

				$email_chk = $this->common->get_rows("users",$con);
				if($email_chk){
					$data['error'] = "Email Already Exists";
				}else{
					$time = date("Y-m-d");
					$record = $this->common->insert("users",array("name"=>$ownername,"email"=>$email,"pass"=>sha1($password),"user_status"=>'Admin',"Joining_date"=>$time));
					if($record){
						$this->db->query("update users set company_id='$record' where u_id='$record'");
						$this->session->set_userdata("distributor",$record);
						$this->session->set_userdata('LoggedIn',TRUE);
						redirect("Dashboard");
					}else{
						$data['error'] = "Some Problem Occured, Plz try again later.";
					}
				}

			}else{
				
				   $data['error'] = "Password doesn't with each other";
			    
			}

		    }else{
		    	$data['error'] = "Please! Enter All fields";
		    }
			
		}
		$data['signup'] = "asdf";


		$this->load->view("Login", $data);
		
	}

	

	
}
