<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Category extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 error_reporting(0);
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Category/";
		 $data['Controller_name'] = "All Categories";
	
// =============================================fix data ends here====================================================
        error_reporting(E_ALL);
		 $con['conditions'] = array("parent_id"=>"0"); 

		 $data['categories'] = $this->common->get_rows("categories",$con);
		 $this->load->view("Category/Category",$data);
	}

	

	public function Addcategory(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Category/";
		 $data['Controller_name'] = "All Categories";
		 $data['method_url'] = "Category/Addcategory";
		 $data['method_name'] = "Add Category";
	
// =============================================fix data ends here====================================================


		if(isset($_POST['Submit'])){

		
			 $parentcat = intval($this->input->post("parentcat")); 
			 $name = htmlspecialchars($this->input->post("name"));
			 $status = ($this->input->post("status"));


			if(empty($name)){
				$this->session->set_flashdata('fail','Plz Fill all fields.');
			    	redirect("/Category/Addcategory");
			}

			
		if(empty($this->input->post("edit"))){

			if(empty($parentcat)){
				$parentcat = 0; 
			}

			
			$con['conditions'] = array("cat_id"=> $parentcat); 
			$parent = $this->common->get_single_row("categories",$con)->parent_id;

			if($parent == 0){
				
				
			}else{
				
					$this->session->set_flashdata('fail','Sorry You cant Make more than 2nd level category');
					redirect("/Category/Addcategory");
				

				
				
			}
			$array = array('cat_name' => $name,'parent_id' => $parentcat,'status' => $status);
			$query = $this->db->insert("categories",$array);
				
		}else{
				$edit = intval($this->input->post("edit"));
			    
			    $con['conditions'] = array('cat_id' => $edit); 
			    $array = array('cat_name' => $name,'parent_id' => $parentcat,'status' => $status);

				$query = $this->common->update("categories",$array,$con);


		}

			if($query){
				
				$this->session->set_flashdata('success','Information added Successfully');
			}else{
				$this->session->set_flashdata('fail','Try Again Later');
			}

			redirect("/Category/Addcategory");

	    }

	    $con['conditions'] = array(); 

		$data['categories']= $this->common->get_rows("categories",$con);
		$this->load->view("Category/Add_Category",$data);
		
	}



	public function Editcategory($id){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Category/";
		 $data['Controller_name'] = "All Product Categories";
		 $data['method_url'] = "Category/Editcategory/".$id;
		 $data['method_name'] = "Edit Product Category";
	
// =============================================fix data ends here====================================================
		

		$con['conditions'] = array(); 
		$data['categories']= $this->common->get_rows("categories",$con);
		
		$con['conditions']=array("cat_id" => $id);
		$data['record'] = $this->common->get_single_row("categories",$con);
		
		$data['cat_id']=$data['record']->parent_id;
		$data['name']=$data['record']->cat_name;
		$data['status']=$data['record']->status;
		$data['edit'] = $id;

	
		$this->load->view("Category/Add_Category",$data);
		
	}


	public function delete(){
		
		$data['user'] = $this->check->Login(); 
		$id = intval($this->input->post("id"));

		$this->db->trans_start(); //transation starts here

		$this->common->delete("categories",array("cat_id"=>$id));
		$con['conditions'] = array("parent_id" =>$id);
		$child = $this->common->get_single_row("categories",$con)->cat_id;


			$this->common->delete("categories",array("cat_id"=>$child));
			$con['conditions'] = array("parent_id" =>$child);
			$grandson = $this->common->get_single_row("categories",$con)->cat_id;

			$this->common->delete("categories",array("cat_id"=>$grandson));
			$con['conditions'] = array("parent_id" =>$grandson);
			$fourthson = $this->common->get_single_row("categories",$con)->cat_id;




		$this->db->trans_complete(); //transation ends here

		if($this->db->trans_status() === FALSE){
			echo "Some Error Occued, plz try again later";
		}else{
			echo "Category Deleted Successfully";
		}
		
		
		
	}


	public function update_notification(){
		
		$data['user'] = $this->check->Login(); 
		
		$array = array('notification' => 0);
		$con['conditions'] = array('c_id' => $this->session->userdata['companyid']); 
		$query = $this->common->update("company",$array,$con);
		
		
		
	}

	

	

	

}
?>