<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('common');
		$this->load->library('googleplus');
	}

	public function index()
	{ 
		if($this->session->userdata('LoggedIn')){
			redirect(SURL."/Dashboard");
		} 
        
        $data['googleURL'] = $this->googleplus->loginURL();

		if(isset($_POST['submit'])){
			 $email = $_POST['email'];
			 $pass  = sha1($_POST['password']); 

			 $sql = "select * from users where email='$email' and pass='$pass' and 
			 	user_status in ('Admin','Employee')";

			 $query = $this->db->query($sql);
			 
			 if($query->num_rows() > 0){
			 	$result = $query->result_array();
			 	$result['user']=$result[0];
			 	$this->session->set_userdata("distributor",$result[0]['u_id']);
				$this->session->set_userdata("username",$result[0]['name']);
				$this->session->set_userdata('LoggedIn',TRUE);
			 	redirect(SURL."Dashboard");

			 }else{
				$data['error'] = "Invalid Email/Password";
			}
			
		}
		$this->load->view("Login", $data);
	}

	public function google_response(){

        if(isset($_GET['code'])){

           $this->googleplus->getAuthenticate();
           $email=$this->googleplus->getUserInfo()['email']; 
           $fname=$this->googleplus->getUserInfo()['given_name']; 
		   $lname=$this->googleplus->getUserInfo()['family_name']; 
		   $name =  ucwords($fname." ".$lname);
           $con['conditions'] = array("email"=>$email);
           $userrecord = $this->common->get_single_row("users", $con);
           if($userrecord == True){
                $this->session->set_userdata("distributor",$userrecord->u_id);
                $this->session->set_userdata('LoggedIn',TRUE);
				redirect(SURL."Dashboard");
           }else{
				$this->db->trans_start();
				
				$time = date("Y-m-d");
				$data = array('name' => $name,
							  'email' => $email,
							  "user_status"=>'Admin',
							  'oauth'=> "Google",
							  'Joining_date'=>Date("Y-m-d")
							);
							  
				$lastrecord = $this->common->insert("users",$data);
				$this->db->query("update users set company_id='$lastrecord' where u_id='$lastrecord'");
                $this->session->set_userdata("distributor",$lastrecord);
                $this->session->set_userdata('LoggedIn',TRUE);
                $this->db->trans_complete();

                if($this->db->trans_status() === FALSE){
                    redirect(SURL."Login");
                }else{
                    redirect(SURL."Dashboard");

                }

           }

        }else{

             redirect(SURL."Login");

        }

    }

	

	
}
