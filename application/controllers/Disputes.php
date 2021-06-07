<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Disputes extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('Common');
		$this->load->library('Uploadimage');
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Disputes/";
		 $data['Controller_name'] = "All Services";
		 $data['Newcaption'] = "All Services";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array();
         $data['disputes'] = $this->common->get_rows("services", $con);

		 $this->load->view("Disputes.php",$data);
	}

	public function Add(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Disputes/";
		 $data['Controller_name'] = "All Services";
		 $data['Newcaption'] = "Add Service";
// =============================================fix data ends here====================================================
		 $data['cat'] = $this->db->query("select * from categories where parent_id='0'")->result_array();
		 //var_dump( $data['cat']);
		 $files="";

		 if(!empty($this->input->post("title"))){

			if($_FILES['files']['size'][0] > 0){ 
					
				$directory = 'uploads/';
				$alowedtype = "*";
				$results = $this->uploadimage->uploadfile($directory,$alowedtype,"files");
				
				if($results){
					$this->uploadimage->resizeimage($results,"550","500");
					foreach ($results as $key => $value) {
						$files .= $directory.$results[$key]['raw_name']."_thumb".$results[$key]['file_ext']."_+.==";
					}
					
				}
						
			}else{
				if(!empty($this->input->post("edit"))){
					$files = $this->db->query("select * from services where service_id='".$this->input->post('edit')."'")->result_array()[0]['porfolio'];
				}
			}


			$record = array(
	 						"u_id"=>$this->session->userdata("distributor"),
	 						"title"=>"I can ".$this->input->post("title"),
	 						"amount"=>$this->input->post("amount"),
	 						"cat"=>$this->input->post("cat"),
							"delivery_day"=>$this->input->post("days"),
							"details"=>$this->input->post("details"),
							"date"=>date("Y-m-d"),
							"porfolio"=>$files
						);
			if(empty($this->input->post("edit"))){
				$insert = $this->common->insert("services",$record);
			}else{
				$insert = $this->input->post("edit");
				$con['conditions'] = array("service_id"=>$insert);
				$this->common->update("services",$record,$con);
			}

			if($this->db->trans_status() === FALSE){
				$this->session->set_flashdata('fail','Something went wrong.plz try again later.');
				redirect(SURL."Disputes/Add");
			}else{
				$this->session->set_flashdata('success','Your service has been posted successfully.');
				redirect(SURL."Disputes/Add");
			}

		}

	    $this->load->view("Addservice.php",$data);
	}

	public function edit($id){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Disputes/";
		 $data['Controller_name'] = "All Services";
		 $data['Newcaption'] = "Add Service";
// =============================================fix data ends here====================================================
		 
		 $data['record'] = $this->db->query("select * from services where service_id='$id'")->result_array()[0];
		 $data['cat'] = $this->db->query("select * from categories where parent_id='0'")->result_array();
		 //echo "<pre>";var_dump($data['record']);

	    $this->load->view("Addservice.php",$data);
	}

	public function delete($id){

		$query = $this->db->query("delete from services where service_id='$id'");
		if($query){
			$this->session->set_flashdata("success","Record deleted");
		}else{
			$this->session->set_flashdata("fail","Something went wrong. please try again later.");
		}
		redirect(SURL."Disputes");
	}

	

}
?>