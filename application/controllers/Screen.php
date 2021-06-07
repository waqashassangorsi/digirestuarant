<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Check');
		$this->load->model('Common');
	}

	public function index($id){ 
        
        // if($this->session->userdata("IsLoggedIn")==FALSE){
        //     redirect(SURL.'Frontlogin');
        // }
         //and end_date >= '$date'
         
        $date = date("Y-m-d h:i:s");
        $userid = $this->session->userdata('userrecord');
        
		$data['record'] = $this->db->query("select * from promotions where playlistid='$id'and end_date >= '$date' order by id limit 1")->result_array();
		
		//echo "<pre>";var_dump($data['record']);
        
		$this->load->view("screen.php",$data);
	}
	
	public function getdata(){
	$date = date("Y-m-d h:i:s");
        $userid = "31";
        $playlistid = $this->input->post("playlistid");
	$lastid = $this->input->post("lastid");
	$Sql = "select * from promotions where playlistid='$playlistid' and id > $lastid and end_date >= '$date' limit 1";
        $data['record'] = $this->db->query($Sql)->result_array();

        if(empty($data['record'])){
            $Sql = "select * from promotions where playlistid='$playlistid' and id >='1' and end_date >= '$date' limit 1";
            $data['record'] = $this->db->query($Sql)->result_array();
        }
		$this->load->view("includes/allincludes.php",$data);
	}
}
?>
