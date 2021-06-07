<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Check.php';

class Badges extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		 $this->load->library('Check');
		 $this->load->model('Common');
         $this->load->library('Uploadimage');
         error_reporting(E_ALL);
	}


	public function index(){ 
		
// =============================================fix data starts here====================================================
		 $data['user'] = $this->check->Login(); 
		 $data['Controller_url'] = "Badges/";
		 $data['Controller_name'] = "All Badges";
		 $data['Newcaption'] = "All Badges";
// =============================================fix data ends here====================================================


		 $con['conditions'] = array();
         $data['badges'] = $this->common->get_rows("badges", $con);

		 $this->load->view("Badges.php",$data);
	}

	public function add(){ 
       
        if($_FILES['file']['size'][0] > 0){ 
				 //echo $_FILES['file']['size'][0];
            $directory = 'uploads/';
            $alowedtype = "*";
            $results = $this->uploadimage->uploadfile($directory,$alowedtype,"file");
            if(!empty($results[0]['file_name'])){
                $files = $directory.$results[0]['file_name'];

                $array = array("value"=>$files);
                $con['conditions']=array("id"=>$this->input->post("id"));
                $query = $this->Common->update("badges",$array,$con);
                if($query){
                    $this->session->set_flashdata('success','Record Updated.');
                    redirect("/Badges"); 
                }else{
                    $this->session->set_flashdata('fail','Some Problem occured plz try again later.');
                    redirect("/Badges");
                }
            }      
        }else{
            $this->session->set_flashdata('fail','Plz insert image.');
			redirect("/Badges");
        }
	}

	

}
?>