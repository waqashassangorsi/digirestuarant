<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Clients extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		 $this->load->helper('download');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Clients/";
		 $data['Controller_name'] = "All Custom offers";
		 $data['Newcaption'] = "All Custom offers";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array();
         $data['freelancers'] = $this->common->get_rows("customoffer", $con);
         //echo "<pre>";var_dump( $data['freelancers']);

		 $this->load->view("Clients.php",$data);
	}


	public function downloadfile($id){
		$files = $this->db->query("select * from customoffer where id='$id'")->result_array()[0]['files'];
		if(empty($files)){
			redirect(SURL."Clients");
		}
		$files = explode("_+.==",$files);
		
		foreach($files as $key=>$value){
			if($value==""){
				continue;
			}
			$link = SURL2.$value;
			$filess = (pathinfo( $link)); 
			$data = file_get_contents($link);
			force_download($filess['basename'], $data);
		}
		
	}	
	

	

	

}
?>