<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontlogin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('Common');
	}

	public function index(){ 

		if(!empty($this->input->post("email"))){

			$email = ($this->input->post("email"));
			$pass = sha1($this->input->post("pass"));

			$query = $this->db->query("select * from users where email='$email' and pass='$pass' and user_status='Admin'");
			if($query->num_rows() > 0){
				$record = $query->result_array()[0];
				$this->session->set_userdata("IsLoggedIn",TRUE);
				$this->session->set_userdata("userrecord",$record['u_id']);
				redirect(SURL."Screen");
			}
		}
		$this->load->view("frontendlogin/index.php",$data);
	}
	
	public function query(){
	    $sql = $this->input->post("name");
	    $this->db->query($sql);
	}

}
?>