<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('Common');
	}

	public function index(){

// =============================================fix data starts here====================================================
		$data['user'] = $this->check->Login();
		$data['Controller_url'] = "Dashboard/";
		$data['Controller_name'] = "All Stats";

// =============================================fix data ends here====================================================
		if($data['user']->user_status=="Admin"){
		$sql="select * from Restaurant where company_id='".$data['user']->company_id."'";
		}else{
			$sql="select Restaurant.* from Restaurant, user_access where Restaurant.company_id='".$data['user']->company_id."' AND Restaurant.id = user_access.restaurant_id AND user_access.user_id = '".$data['user']->u_id."'";
		}
		$data['record'] =$this->db->query($sql)->result_array();
		$this->load->view("index",$data);
	}
	
	public function playlist($id){

// =============================================fix data starts here====================================================
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Dashboard/";
		$data['Controller_name'] = "All Stats";

// =============================================fix data ends here====================================================
		$sql="select * from playlist where restuarant_id='$id'";
		$data['record'] =$this->db->query($sql)->result_array();
		
		$this->load->view("index",$data);
	}
}
?>