<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Area extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Area/";
		 $data['Controller_name'] = "All Areas";
		 $data['Newcaption'] = "All Areas";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("company_id" => $data['user']->company_id);
         $data['area'] = $this->Common->get_rows("area", $con);
         //echo "<pre>"; var_dump($data['customer']);
		 $this->load->view("Area/Area.php",$data);
	}

	public function AddArea(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Area/";
		 $data['Controller_name'] = "Add Area";
		 $data['method_url'] = "Area/AddArea";
		 $data['method_name'] = "Add Area";
	
// =============================================fix data ends here====================================================


		if(isset($_POST['Submit'])){

			 //echo "<pre>"; var_dump($this->input->post()); exit();
			$name = ($this->input->post("name"));
			

			$this->db->trans_start();

			if(empty($name)){
				$this->session->set_flashdata('fail','Plz FIll all fields.');
			    	redirect("/Area/AddArea");
			}
		    

			if(empty($this->input->post("edit"))){

				$con = array('name' => $name,'company_id' => $this->session->userdata['companyid']);
			    $query = $this->common->insert("area",$con);

			    //notification for activity starts here
					$caption = "Area Added by ".$data['user']->name;
					$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Area Added','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
					$this->db->insert("activity",$array);

					$this->db->set('notification', 'notification+1', FALSE);
					$this->db->where('c_id', $this->session->userdata['companyid']);
					$this->db->update('company');

				//notification for activity ends here


				
			}else{
				 $edit = intval($this->input->post("edit")); 
			    
			    $con['conditions'] = array('area_id' => $edit); 
			    $array = array('name' => $name,'company_id' => $this->session->userdata['companyid']);

				$query = $this->common->update("area",$array,$con);

				//notification for activity starts here
				$caption = "Area Edited by ".$data['user']->name;
				$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Area Edited','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
				$this->db->insert("activity",$array);

				$this->db->set('notification', 'notification+1', FALSE);
				$this->db->where('c_id', $this->session->userdata['companyid']);
				$this->db->update('company');

				//notification for activity ends here

		    }

		    $this->db->trans_complete();

		    if($this->db->trans_status() === FALSE){
		    	$this->session->set_flashdata('fail','Try Again Later');
		    }else{
		    	$this->session->set_flashdata('success','Information added Successfully');
		    }


			redirect("/Area/AddArea");

	    }

		
		
		$this->load->view("Area/Add_Area.php",$data);
	}

	public function Editarea($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Area/";
		 $data['Controller_name'] = "All Area";
		 $data['method_url'] = "Area/AddArea";
		 $data['method_name'] = "Edit Area";
	
// =============================================fix data ends here====================================================
		 $con['conditions'] = array("area_id"=>$id);
		 $record = $this->common->get_single_row("area",$con);
		 if($record){
		 	$data['record'] = $record;
		 }else{
		 	$this->session->set_flashdata('fail','Record Not Found');
			redirect("/Area");
		 }

		 if($record->company_id == $data['user']->company_id){

		  }else{
		  	$this->session->set_flashdata('fail','You cant edit this vendor.');
			redirect("/Area");
		  }
		

		 $data['edit'] = $id;
		
		$this->load->view("Area/Add_Area.php",$data);
	}

	public function delete(){
		
		$data['user'] = $this->check->Login(); 
		$id = intval($this->input->post("id"));
		$this->db->trans_start(); //transation starts here

		$this->common->delete("area",array("area_id"=>$id));
			//notification for activity starts here
			$caption = "Area Deleted by ".$data['user']->name;
			$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Area Deleted','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
			$this->db->insert("activity",$array);

			$this->db->set('notification', 'notification+1', FALSE);
			$this->db->where('c_id', $this->session->userdata['companyid']);
			$this->db->update('company');

			//notification for activity ends here

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			echo "Some Error Occued, plz try again later";
		}else{
			echo "Area Deleted Successfully";
		}
	}	
	

	

	

}
?>