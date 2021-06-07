<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Sitesettings extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Sitesettings/";
		$data['Controller_name'] = "Edit Site Settings";
	
		$con['conditions'] = array("u_id"=>$data['user']->u_id); 
		$data['record'] = $this->common->get_rows("users",$con)[0];

		if(!empty($this->input->post("email"))){

			$query = $this->db->query("select * from users where email='".$this->input->post("email")."' and u_id !='".$data['user']->u_id."'");

			if($query->num_rows() > 0){
				
			}
			$array = array('' => , );
		}
		var_dump($data['record']);

        $this->load->view("Add_settings",$data);
	}

	
}
?>