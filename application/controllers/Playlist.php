<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Playlist extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Playlist/";
		 if(!empty($this->uri->segment('3'))){
		    $name = $this->db->query("select * from Restaurant where id='".$this->uri->segment('3')."'")->result_array()[0]['Name']; 
		    $data['Controller_name'] = $name." Playlist";
		 }else{
		    $data['Controller_name'] = "All Playlist";
		 }
	
// =============================================fix data ends here====================================================
         
         if(!empty($this->uri->segment('3'))){
            $sql="select * from playlist where restuarant_id='".$this->uri->segment('3')."'";
         }else{
            $sql="select * from playlist where company_id='".$data['user']->company_id."'"; 
         }
		 
		 $data['record'] =$this->db->query($sql)->result_array();
		// echo"<pre>";var_dump($data['record']);
		 
		 $this->load->view("playlist",$data);
	}

	public function add(){
	    
	    $data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Playlist/";
		$data['Controller_name'] = "Add Playlist";
		
		//echo "<pre>";var_dump($this->input->post());exit;
	    $data['restuarant'] =$this->db->query("select * from Restaurant where company_id='".$data['user']->company_id."'")->result_array();
	    if(!empty($this->input->post("name"))){ 
		   
            $arrat =  array(
                             "name"=>$this->input->post("name"),
                             "restuarant_id"=>$this->input->post("restuarant_id"),
                             "company_id"=>$data['user']->company_id
                           );
		
		    if(empty($this->input->post("edit"))){
		        $query = $this->common->insert("playlist",$arrat);
		    }else{
		        $con['conditions']=array("id"=>$this->input->post("edit"));
		        $query = $this->common->update("playlist",$arrat,$con);
		    }
		    
			if($query){
			    $this->session->set_flashdata('success','Added Successfully');
				 redirect("/Playlist/index/".$this->input->post("restuarant_id"));
			}else{
			    $this->session->set_flashdata('fail','Some error occured,plz try again later');
				redirect("/Playlist/index/".$this->input->post("restuarant_id"));
			}
	    }	
	    $this->load->view("Addplaylist.php",$data);
	}



	public function edit($id){
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Playlist/";
		$data['Controller_name'] = "Add Playlist";
		
		$data['restuarant'] =$this->db->query("select * from Restaurant")->result_array();
		$data['record']=$this->db->query("select * from playlist where id='$id'")->result_array()[0];
		
		
		
		$this->load->view("Addplaylist",$data);
	}

	public function delete($id){
	    
	    $restuarant_id = $this->db->query("select * from playlist where id='$id'")->result_array()[0]['restuarant_id'];
	    
	    $this->db->query("delete from promotions where playlistid='$id'");
	    
		$query = $this->db->query("delete from playlist where id='$id'");
		if($query){
			$this->session->set_flashdata("success","Record Deleted Successfully.");
		}else{
			$this->session->set_flashdata("fail","Something Went Wrong.");
		}
		redirect(SURL."Playlist/index/$restuarant_id");
	}


	

}
?>