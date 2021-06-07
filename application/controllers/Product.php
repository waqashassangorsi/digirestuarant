<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Product extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Product/";
		 $data['Controller_name'] = "All Products";
	
// =============================================fix data ends here====================================================

		 $con['conditions'] = array("company_id"=> $this->session->userdata['companyid']); 

		 $data['products'] = $this->common->get_rows("product",$con);
		 $this->load->view("Product",$data);
	}

	

	public function Addproduct(){ 

// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Product/";
		 $data['Controller_name'] = "All Products";
		 $data['method_url'] = "Product/Addproduct";
		 $data['method_name'] = "Add Product";
	
// =============================================fix data ends here====================================================
		 $con['conditions'] = array("company_id"=> $this->session->userdata['companyid']); 
		 $data['categories'] = $this->common->get_rows("category",$con);

		 $con['conditions'] = array("company_id"=> $this->session->userdata['companyid']); 
		 $data['vendor'] = $this->common->get_rows("vendor",$con);

		 $this->load->view("Add_Products",$data);

	}


		public function edit($id){ 

		$id = intval($id);
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Product/";
		 $data['Controller_name'] = "All Products";
		 $data['method_url'] = "Product/Addproduct";
		 $data['method_name'] = "Edit Product";
	
// =============================================fix data ends here====================================================
		 $con['conditions'] = array("company_id"=> $this->session->userdata['companyid']); 
		 $data['categories'] = $this->common->get_rows("category",$con);

		 $con['conditions'] = array("company_id"=> $this->session->userdata['companyid']); 
		 $data['vendor'] = $this->common->get_rows("vendor",$con);


		 $con['conditions'] = array("p_id"=> $id); 
		 $data['product'] = $this->common->get_rows("product",$con);

		 $this->load->view("Add_Products",$data);

	}

	public function Add(){ 
	//var_dump($this->input->post()); exit;
		$data['user'] = $this->check->Login(); 


		$pcat = $this->input->post('cat');
		$v_id = $this->input->post('vendor');
		$p_name = $this->input->post('name');
		$invoice_price = $this->input->post('invoice_price');
		$retail_price = $this->input->post('retail_price');
		$whole_sale_price = $this->input->post('whole_sale_price');
		$discount = $this->input->post('discount');
		$ctn_packing = $this->input->post('ctn_packing');
		$opngbl = $this->input->post('opngbl');
		$status = $this->input->post('status');


		$this->db->trans_start();
				$array = array(
					'p_cat'=>$pcat,
					'v_id'=>$v_id,
					'p_name'=>$p_name,
					'invoice_price'=>$invoice_price,
					'retail_price'=>$retail_price,
					'whole_sale_price'=>$whole_sale_price,
					'discount'=>$discount,
					'ctn_packing'=>$ctn_packing,
					'opngbl'=>$opngbl,
					"status"=>$status,
					'company_id'=>$this->session->userdata['companyid']
				);

		if(empty($this->input->post('edit'))){
			$this->common->insert("product",$array);

			$caption = "Product $p_name Added by ". $data['user']->name;
			$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Product Added','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
			$this->db->insert("activity",$array);

		}else{
			$con['conditions'] = array("p_id"=>intval($this->input->post('edit')));

		    $this->common->update("product", $data, $con);

		    $caption = "Product $p_name Edited by ".$data['user']->name;
			$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Product Updated','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
			$this->db->insert("activity",$array);
		}

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			$this->session->set_flashdata('fail','Some Error Occued, plz try again later');
		}else{
			$this->session->set_flashdata('success','Product added Successfully');
			
		}

		redirect("/Product/Addproduct");
	}	

	public function delete(){
		
		$data['user'] = $this->check->Login(); 
		$id = intval($this->input->post("id"));

		$this->db->trans_start(); //transation starts here

		$this->common->delete("category",array("cat_id"=>$id));
		$con['conditions'] = array("parent_id" =>$id);
		$child = $this->common->get_single_row("category",$con)->cat_id;


			$this->common->delete("category",array("cat_id"=>$child));
			$con['conditions'] = array("parent_id" =>$child);
			$grandson = $this->common->get_single_row("category",$con)->cat_id;

			$this->common->delete("category",array("cat_id"=>$grandson));
			$con['conditions'] = array("parent_id" =>$grandson);
			$fourthson = $this->common->get_single_row("category",$con)->cat_id;

			$this->common->delete("category",array("cat_id"=>$fourthson));
			$con['conditions'] = array("parent_id" =>$fourthson);
			$fifthson = $this->common->get_single_row("category",$con)->cat_id;

			$this->common->delete("category",array("cat_id"=>$fifthson));
			$con['conditions'] = array("parent_id" =>$fifthson);
			$child = $this->common->get_single_row("category",$con)->cat_id;


			$caption = "Product categories Deleted by ".$data['user']->name;
			$array = array('company_id'=>$this->session->userdata['companyid'],'status'=>'Product Category Deleted','caption'=>$caption,'act_date'=>date("Y-m-d"),'u_id'=>$data['user']->u_id,'time'=>date("H:i:s"));
			$this->db->insert("activity",$array);

			$this->db->set('notification', 'notification+1', FALSE);
			$this->db->where('c_id', $this->session->userdata['companyid']);
			$this->db->update('company');


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