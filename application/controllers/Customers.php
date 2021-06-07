<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Customers extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Customers/";
		 $data['Controller_name'] = "All Customers";
		 $data['Newcaption'] = "All Customers";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array("company_id" => $data['user']->company_id);
         $data['customer'] = $this->Common->get_rows("customers", $con);
         //echo "<pre>"; var_dump($data['customer']);
		 $this->load->view("Customers/Customers.php",$data);
	}

	public function AddCustomers(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Customers/";
		 $data['Controller_name'] = "All Customers";
		 $data['method_url'] = "Customers/AddCustomers";
		 $data['method_name'] = "Add Customers";
	
// =============================================fix data ends here====================================================


		if(isset($_POST['Submit'])){

			
			$name = ($this->input->post("name"));
			$address = ($this->input->post("address"));
			$cellno = ($this->input->post("cellno"));
			$area = ($this->input->post("area"));
			$opngbl = ($this->input->post("opngbl"));
			$status = ($this->input->post("status"));
			$lat = ($this->input->post("lat"));
			$long = ($this->input->post("long"));
			$cus_status = ($this->input->post("cus_status"));
			

			$this->db->trans_start();

			if(empty($name)){
				$this->session->set_flashdata('fail','Plz FIll all fields.');
			    	redirect("/Customers/AddCustomers");
			}
		    

			if(empty($this->input->post("edit"))){

				$con = array('c_name' => $name,'c_address' => $address,'c_area_id' => $area,'company_id' => $this->session->userdata['companyid'],
					'cell_no' => $cellno,'c_opngbl' => $opngbl,'opn_type' => $status,'lat' => $lat,'longi' => $long,'status' => $cus_status);
			    $query = $this->common->insert("customers",$con);

			    //notification for activity starts here
					$caption = "Customer Added by ".$data['user']->name;
					$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Customer Added','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
					$this->db->insert("activity",$array);

					$this->db->set('notification', 'notification+1', FALSE);
					$this->db->where('c_id', $this->session->userdata['companyid']);
					$this->db->update('company');

				//notification for activity ends here


				
			}else{
				 $edit = intval($this->input->post("edit")); 
			    
			    $con['conditions'] = array('c_id' => $edit); 
			    $array = array('c_name' => $name,'c_address' => $address,'c_area_id' => $area,'company_id' => $this->session->userdata['companyid'],
					'cell_no' => $cellno,'c_opngbl' => $opngbl,'opn_type' => $status,'lat' => $lat,'longi' => $long,'status' => $cus_status);

				$query = $this->common->update("customers",$array,$con);

				//notification for activity starts here
				$caption = "Customer Edited by ".$data['user']->name;
				$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Customer Edited','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
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


			redirect("/Customers/AddCustomers");

	    }

		$con['conditions'] = array("company_id"=>$this->session->userdata['companyid']);
		$data['area'] = $this->common->get_rows("area",$con);
		
		$this->load->view("Customers/Add_Customers.php",$data);
	}

	public function EditCustomer($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Customers/";
		 $data['Controller_name'] = "All Customers";
		 $data['method_url'] = "Customers/AddCustomers";
		 $data['method_name'] = "Add Customer";
	
// =============================================fix data ends here====================================================
		 $con['conditions'] = array("c_id"=>$id);
		 $record = $this->common->get_single_row("customers",$con);
		 //echo "<pre>";var_dump($record);
		 if($record){
		 	$data['record'] = $record;
		 }else{
		 	$this->session->set_flashdata('fail','Record Not Found');
			redirect("/Customers");
		 }

		 if($record->company_id == $data['user']->company_id){

		  }else{
		  	$this->session->set_flashdata('fail','You cant edit this vendor.');
			redirect("/Customers");
		  }
		

		 $data['edit'] = $id;
		 $con['conditions'] = array("company_id"=>$this->session->userdata['companyid']);
		 $data['area'] = $this->common->get_rows("area",$con);
		
		$this->load->view("Customers/Add_Customers.php",$data);
	}

	public function delete(){
		
		$data['user'] = $this->check->Login(); 
		$id = intval($this->input->post("id"));
		$this->db->trans_start(); //transation starts here

		$this->common->delete("customers",array("c_id"=>$id));
			//notification for activity starts here
			$caption = "Customer Deleted by ".$data['user']->name;
			$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Customer Deleted','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
			$this->db->insert("activity",$array);

			$this->db->set('notification', 'notification+1', FALSE);
			$this->db->where('c_id', $this->session->userdata['companyid']);
			$this->db->update('company');

			//notification for activity ends here

		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			echo "Some Error Occued, plz try again later";
		}else{
			echo "Customer Deleted Successfully";
		}
	}	
	

	

	

}
?>