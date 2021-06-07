<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Restaurant extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Restaurant/";
		 $data['Controller_name'] = "All Restaurant";
	
// =============================================fix data ends here====================================================
        if($data['user']->user_status=="Admin"){
		$sql="select * from Restaurant where company_id='".$data['user']->company_id."'";
		}else{
			$sql="select Restaurant.* from Restaurant, user_access where Restaurant.company_id='".$data['user']->company_id."' AND Restaurant.id = user_access.restaurant_id AND user_access.user_id = '".$data['user']->u_id."'";
		}
		 $data['record'] =$this->db->query($sql)->result_array();
		// echo"<pre>";var_dump($data['record']);
		 
		 $this->load->view("Restaurant",$data);
	}

	public function add(){
	    
	    $data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Restaurant/";
		$data['Controller_name'] = "Add Restaurant";
	    
	    if(!empty($this->input->post("name"))){ 
            
            $arrat =  array(
                             "Name"=>$this->input->post("name"),
                             "company_id"=> $data['user']->company_id
                             
                        );
		
		   if(empty($this->input->post("edit"))){
				$query = $this->common->insert("Restaurant",$arrat);
				$arrat = array(
                             "company_id"=>$data['user']->company_id,
                             "user_id"=>$data['user']->u_id,
							 "restaurant_id"=> $this->db->insert_id()
                        );
		       $query2 = $this->common->insert("user_access",$arrat);
		   }else{
		       $con['conditions'] = array("id"=>$this->input->post("edit"));
		       $query = $this->common->update("Restaurant",$arrat,$con);
		   }
		   
			if($query && $query2){
			    $this->session->set_flashdata('success','Added Successfully');
				 redirect("/Restaurant");
			}else{
			    $this->session->set_flashdata('fail','Some error occured,plz try again later');
				 redirect("/Restaurant");
			}
	    }	
	    $this->load->view("AddRestaurant.php",$data);
	}



	public function edit($id){
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Restaurant/";
		$data['Controller_name'] = "Edit Restaurant";
		$data['edit']="2";
		
		$data['record']=$this->db->query("select * from Restaurant where id='$id'")->result_array()[0];
		
		
		
		$this->load->view("AddRestaurant",$data);
	}

	public function delete($id){
	    //error_reporting(E_ALL);
	    $screens = $this->db->query("select * from playlist where restuarant_id='$id'")->result_array();
	   
	    foreach($screens as $key=>$value){
	        $this->db->query("delete from promotions where playlistid='".$value['id']."'");
	    }
	    $this->db->query("delete from playlist where restuarant_id='$id'");
	    
		$query = $this->db->query("delete from Restaurant where id='$id'");
		if($query){
			$this->session->set_flashdata("success","Record Deleted Successfully.");
		}else{
			$this->session->set_flashdata("fail","Something Went Wrong.");
		}
		redirect(SURL."Restaurant");
	}

	public function deletescnd($id){
		$query = $this->db->query("delete from promotion2 where id='$id'");
		if($query){
			$this->session->set_flashdata("success","Record Deleted Successfully.");
		}else{
			$this->session->set_flashdata("fail","Something Went Wrong.");
		}
		redirect(SURL."Promotions");
	}

	public function addpromotion(){
		$data['user'] = $this->check->Login(); 
		//echo "<pre></pre>";var_dump($this->input->post());exit;

		if($this->input->post("versiontype")==1){
			
				$array = array(
					"firstdish"=>$this->input->post("firstdish"),
					"dish1price"=>$this->input->post("dish1price"),
					"dish1version"=>$this->input->post("dish1version"),
					"seconddish"=>$this->input->post("seconddish"),
					"dish2price"=>$this->input->post("dish2price"),
					"dish2version"=>$this->input->post("dish2version"),
					"thirddish"=>$this->input->post("thirddish"),
					"dish3price"=>$this->input->post("dish3price"),
					"dish3version"=>$this->input->post("dish3version"),
					"leftproduct"=>$this->input->post("leftproduct"),
					"leftproductprice"=>$this->input->post("leftproductprice"),
					"leftproductversion"=>$this->input->post("leftproductversion"),
					"rightproduct"=>$this->input->post("rightproduct"),
					"rightproductprice"=>$this->input->post("rightproductprice"),
					"rightproductversion"=>$this->input->post("rightproductversion"),
					"start_Date"=>$this->input->post("start_Date"),
					"end_Date"=>$this->input->post("end_Date"),
					"versiontype"=>$this->input->post("versiontype"),
					"company_id"=>$data['user']->company_id,
					"date"=>date("Y-m-d")
				);

				if(!empty($this->input->post("edit"))){
					$con['conditions']=array("id"=>$this->input->post("edit"));
					$query = $this->common->update("promotions",$array,$con);
				}else{
					$query = $this->common->insert("promotions",$array);
				}
		}else{
				$array = array(
					"first_line"=>$this->input->post("first_line"),
					"first_line_version"=>$this->input->post("first_line_version"),
					"second_line"=>$this->input->post("second_line"),
					"secondlineversion"=>$this->input->post("secondlineversion"),
					"dodakti_item"=>$this->input->post("dodakti_item"),
					"dodakti_item_price"=>$this->input->post("dodakti_item_price"),
					"dodakti_item_scnd"=>$this->input->post("dodakti_item_scnd"),
					"versiontype"=>$this->input->post("versiontype"),
					"dodakti_item_scnd_price"=>$this->input->post("dodakti_item_scnd_price"),
					"dodakti_item_thrd"=>$this->input->post("dodakti_item_thrd"),
					"dodakti_item_thrd_price"=>$this->input->post("dodakti_item_thrd_price"),
					"dodakti_item_forth"=>$this->input->post("dodakti_item_forth"),
					"dodakti_item_forth_price"=>$this->input->post("dodakti_item_forth_price"),
					"dodakti_item_fifth"=>$this->input->post("dodakti_item_fifth"),
					"dodakti_item_fifth_price"=>$this->input->post("dodakti_item_fifth_price"),
					"dodakti_item_sixth"=>$this->input->post("dodakti_item_sixth"),
					"dodakti_item_sixth_price"=>$this->input->post("dodakti_item_sixth_price"),
					"dodakti_item_sevnth"=>$this->input->post("dodakti_item_sevnth"),
					"dodakti_item_sevnth_price"=>$this->input->post("dodakti_item_sevnth_price"),
					"dodakti_item_eight"=>$this->input->post("dodakti_item_eight"),
					"dodakti_item_eight_price"=>$this->input->post("dodakti_item_eight_price"),
					"dodakti_item_nine"=>$this->input->post("dodakti_item_nine"),
					"dodakti_item_nine_price"=>$this->input->post("dodakti_item_nine_price"),
					"start_Date"=>$this->input->post("start_Date"),
					"end_Date"=>$this->input->post("end_Date"),
					"company_id"=>$data['user']->company_id,
				);

				if(!empty($this->input->post("edit"))){
					$con['conditions']=array("id"=>$this->input->post("edit"));
					$query = $this->common->update("promotion2",$array,$con);
				}else{
					$query = $this->common->insert("promotion2",$array);
				}
		}			 
		
		

		if($query){
			$this->session->set_flashdata("success","Record Deleted Successfully.");
		}else{
			$this->session->set_flashdata("fail","Something went wrong.");
		}
		
		redirect(SURL."Promotions");
	}

	

}
?>