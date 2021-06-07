<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Promotions extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('common');
		 $this->load->library('Uploadimage');
		 require_once(APPPATH.'libraries/getid3/getid3/getid3.php');
	}


	public function index(){
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login();
		 $data['Controller_url'] = "Promotions/";
		 if(!empty($this->uri->segment("3"))){ 
		     $query = $this->db->query("select Restaurant.*,playlist.* from playlist inner join Restaurant on Restaurant.id=playlist.id where playlist.id='".$this->uri->segment("3")."'")->result_array()[0];
		     $data['Controller_name'] = $query['Name']." ".$query['name'];
		 }else{
		     $data['Controller_name'] = "All Promotions";
		 }
		 
	
// =============================================fix data ends here====================================================
        
         
         if(!empty($this->uri->segment("3"))){ 
             $con['conditions'] = array("company_id"=>$data['user']->company_id,"playlistid"=>$this->uri->segment("3"));
         }else{
             $con['conditions'] = array("company_id"=>$data['user']->company_id);
         }

		 $data['record'] = $this->common->get_rows("promotions",$con);
		 
// 		 echo $data['record'][0]['company_id']; echo "<br>";
// 		 echo $data['user']->company_id;
		 
// 		 if($data['record'][0]['company_id']==$data['user']->company_id){
		     
// 		 }else{
// 		     redirect(SURL);
// 		 }
		 //echo "<pre>";var_dump($data['record']);
		 $this->load->view("Promotions",$data);
	}

	public function add(){
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Promotions/";
		$data['Controller_name'] = "Choose Promotions"; 
		
		
		
		
		$images = $this->db->query("select * from promotion_image where company_id='".$data['user']->company_id."'");
		//echo "<pr></pr>";var_dump($data['images']);
        $data['restuarant'] = $this->db->query("select * from playlist")->result_array();
		if($images->num_rows() == 0){
			$this->session->set_flashdata("fail","Sorry You cant add a promotion. Because you have not uploaded layouts");
			redirect(SURL.'Promotions');
		}
		$data['images'] = $images->result_array();
		$this->load->view("Promotionsversionsfield",$data);
	}

	public function editpromotionone($id){
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Promotions/";
		$data['Controller_name'] = "Choose Promotions";
		$data['edit']="1";
		$data['restuarant'] = $this->db->query("select * from playlist")->result_array();
		$data['record']=$this->db->query("select * from promotions where id='$id'")->result_array()[0];
		
		$data['images'] = $this->db->query("select * from promotion_image where image_id='".$data['record']['versiontype']."'")->result_array();
		
		$this->load->view("Promotionsversionsfield",$data);
	}

	public function editpromotionsecond($id){
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Promotions/";
		$data['Controller_name'] = "Choose Promotions";
		$data['edit']="2";
		$data['restuarant'] = $this->db->query("select * from playlist")->result_array();
		$data['record']=$this->db->query("select * from promotions where id='$id'")->result_array()[0];
		
		$data['images'] = $this->db->query("select * from promotion_image where image_id='".$data['record']['versiontype']."'")->result_array();
		
		$this->load->view("Promotionsversionsfield",$data);
	}
	
	public function editpromotionthrd($id){
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Promotions/";
		$data['Controller_name'] = "Choose Promotions";
		$data['edit']="3";
		$data['restuarant'] = $this->db->query("select * from playlist")->result_array();
		$data['record']=$this->db->query("select * from promotions where id='$id'")->result_array()[0];
		
		$data['images'] = "";
		$data['editimage']=3;
		$this->load->view("Promotionsversionsfield",$data);
	}
	
	public function editpromotionthrdvideo($id){
		$data['user'] = $this->check->Login(); 
		$data['Controller_url'] = "Promotions/";
		$data['Controller_name'] = "Choose Promotions";
		$data['edit']="4";
		$data['restuarant'] = $this->db->query("select * from playlist")->result_array();
		$data['record']=$this->db->query("select * from promotions where id='$id'")->result_array()[0];
		
		$data['images'] = "";
		$data['editimage']=4;
		$this->load->view("Promotionsversionsfield",$data);
	}

	public function delete($id){
	    $playlistid = $this->db->query("select * from promotions where id='$id'")->result_array()[0]['playlistid'];
	    
		$query = $this->db->query("delete from promotions where id='$id'");
		if($query){
			$this->session->set_flashdata("success","Record Deleted Successfully.");
		}else{
			$this->session->set_flashdata("fail","Something Went Wrong.");
		}
		redirect(SURL."Promotions/index/$playlistid");
	}

	public function deletescnd($id){
	    $playlistid = $this->db->query("select * from promotions where id='$id'")->result_array()[0]['playlistid'];
		$query = $this->db->query("delete from promotions where id='$id'");
		if($query){
			$this->session->set_flashdata("success","Record Deleted Successfully.");
		}else{
			$this->session->set_flashdata("fail","Something Went Wrong.");
		}
		redirect(SURL."Promotions/index/$playlistid");
	}
	
	public function deletethrd($id){
	    $playlistid = $this->db->query("select * from promotions where id='$id'")->result_array()[0]['playlistid'];
		$query = $this->db->query("delete from promotions where id='$id'");
		if($query){
			$this->session->set_flashdata("success","Record Deleted Successfully.");
		}else{
			$this->session->set_flashdata("fail","Something Went Wrong.");
		}
		redirect(SURL."Promotions/index/$playlistid");
	}

	public function addpromotion(){
		$data['user'] = $this->check->Login(); 
		ini_set('max_execution_time', 0);
        error_reporting(E_ALL);
		//echo "<pre>";var_dump($_FILES);exit;
        
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
					"duration"=>$this->input->post("duration"),
                    "start_time"=>$this->input->post("from_time"),
					"end_time"=>$this->input->post("to_time"),
					"playlistid"=>$this->input->post("restuarantid"),
					"pro_type"=>"1",
					"company_id"=>$data['user']->company_id,
					"date"=>date("Y-m-d")
				);

				if(!empty($this->input->post("edit"))){
					$con['conditions']=array("id"=>$this->input->post("edit"));
					$query = $this->common->update("promotions",$array,$con);
				}else{
					$query = $this->common->insert("promotions",$array);
				}
		}else if($this->input->post("versiontype")==2){
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
					"duration"=>$this->input->post("duration"),
                    "start_time"=>$this->input->post("from_time"),
					"end_time"=>$this->input->post("to_time"),
					"pro_type"=>"2",
					"playlistid"=>$this->input->post("restuarantid"),
					"company_id"=>$data['user']->company_id,
				);

				if(!empty($this->input->post("edit"))){
					$con['conditions']=array("id"=>$this->input->post("edit"));
					$query = $this->common->update("promotions",$array,$con);
				}else{
					$query = $this->common->insert("promotions",$array);
				}
				
		}else if($this->input->post("versiontype")==3){
		    
		    if($_FILES['file']['size'] > 0){  
                $type = "Image";
                $directory = 'uploads/';
                $alowedtype = "gif|jpg|png|jpeg";
                $results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"file");
                //echo "<pre>";var_dump($results); exit;
                if(!empty($results[0]["file_name"])){
                    $file = $directory.$results[0]['file_name'];
                }
	        }else{
	            if(!empty($this->input->post("edit"))){
	                $file = $this->db->query("select * from promotions where id='".$this->input->post("edit")."'")->result_array()[0]['image'];
	            }
	        }
	        
	        if($file == ""){
	             $this->session->set_flashdata('fail','Some error occured,please try again later');
				 redirect(SURL);
	        }else{
	            $array =  array(
                             "image"=>$file,
                             "type"=>"Image",
                             "duration"=>$this->input->post("duration"),
                             "start_time"=>$this->input->post("from_time"),
					         "end_time"=>$this->input->post("to_time"),
                             "start_Date"=>$this->input->post("start_Date"),
					         "end_Date"=>$this->input->post("end_Date"),
					         "company_id"=>$data['user']->company_id,
					         "pro_type"=>"3",
					         "playlistid"=>$this->input->post("restuarantid"),
                           );
	            
	            if(!empty($this->input->post("edit"))){
					$con['conditions']=array("id"=>$this->input->post("edit"));
					$query = $this->common->update("promotions",$array,$con);
	            }else{
	                $query = $this->common->insert("promotions",$array);
	            }
	            
	        }
	        
		}else if($this->input->post("versiontype")==4){
		    if($_FILES['video']['size'] > 0){  
                $type = "Video";
                $directory = 'uploads/';
                $alowedtype = "*";
                $results = $this->uploadimage->singleuploadfile($directory,$alowedtype,"video");
                //echo "<pre>";var_dump($results); exit;
                if(!empty($results[0]["file_name"])){
                    $file = $directory.$results[0]['file_name'];
                }
	        }else{
	            if(!empty($this->input->post("edit"))){
	                $file = $this->db->query("select * from promotions where id='".$this->input->post("edit")."'")->result_array()[0]['image'];
	            }
	        }
	        
	        $getID3 = new getID3();
            $fileinfo = $getID3->analyze($file);
            $duration = intval($fileinfo['playtime_seconds']);
	        
	        if($file==""){
	             $this->session->set_flashdata('fail','Some error occured,plz try again later');
				 redirect("/Promotions");
	        }else{
	            $array =  array(
                             "image"=>$file,
                             "type"=>"Video",
                             "duration"=>$duration,
                             "start_time"=>$this->input->post("from_time"),
					         "end_time"=>$this->input->post("to_time"),
                             "start_Date"=>$this->input->post("start_Date"),
					         "end_Date"=>$this->input->post("end_Date"),
					         "company_id"=>$data['user']->company_id,
					         "pro_type"=>"3",
					         "playlistid"=>$this->input->post("restuarantid"),
                           );
	            if(!empty($this->input->post("edit"))){
					$con['conditions']=array("id"=>$this->input->post("edit"));
					$query = $this->common->update("promotions",$array,$con);
	            }else{
	                $query = $this->common->insert("promotions",$array);
	            }
	        }
		}

		if($query){
			$this->session->set_flashdata("success","Record Inserted Successfully.");
		}else{
			$this->session->set_flashdata("fail","Something went wrong.");
		}
		redirect(SURL."Promotions/index/".$this->input->post("restuarantid"));
	}


}
?>
