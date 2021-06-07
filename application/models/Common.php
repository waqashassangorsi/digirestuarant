<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Common extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function send_email($to_email, $subject, $html, $attachments = array()){
		$from_email = "support@haydots.com"; 
		$this->load->library('email'); 
		$config = array('charset'=>'utf-8', 'wordwrap'=> TRUE, 'mailtype' => 'html');
		$this->email->initialize($config);
		$this->email->from($from_email, 'Surf N Work');
		$this->email->to($to_email);
		$this->email->subject($subject);
		foreach($attachments as $attach){
			$this->email->attach($attach);
		}
		$logo = IMG."Untitled-2.png";
		$html = str_replace("[LOGO]","<img src='".$logo."'>",$html);
	
		$this->email->message($html);
		
		if($this->email->send()){
			return true;
		}else{
			return false;
		}
	}	

	function genrate_session_key($user_id){
        return $new_key = md5(microtime().rand().$user_id);
        
    }
	
	public function insert($table,$data = array()){
		
		$query = $this->db->insert($table,$data);
		if($query){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function get_rows($table, $params = array()){
		$this->db->select('*');
		$this->db->from($table);

		if(array_key_exists("conditions", $params)){

			foreach ($params['conditions'] as $key => $value) {
				 $this->db->where($key,$value);
			}
        	

			$query = $this->db->get();
			if($query->num_rows() > 0){

			 	return $query->result_array();
			}else{
			 	return false;
			}

		}else{
			return false;
		}
	}

	public function get_rows_by_limit($table, $params = array(),$field,$limit,$sort){
		$this->db->select('*');
		$this->db->from($table);

		if(array_key_exists("conditions", $params)){

			foreach ($params['conditions'] as $key => $value) {
				 $this->db->where($key,$value);
			}
			if(!empty($field) &&(!empty($limit))){
				$this->db->order_by($field,$sort);
				$this->db->limit($limit);
				
			}

			
        	

			$query = $this->db->get();
			if($query->num_rows() > 0){

			 	return $query->result_array();
			}else{
			 	return false;
			}

		}else{
			return false;
		}
	}


	public function get_single_row($table_name, $params = array()){
		$this->db->select('*');
		$this->db->from($table_name);

		if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}

			$query = $this->db->get();
			if($query->num_rows() > 0){

				return $query->row();

			}else{
				return false;
			}
			
		

		}else{
			return false;
		}
	}

	public function update($table, $data = array(), $params = array()){
		if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}
			if($this->db->update($table, $data)){
				return true;
			}
		}else{

			return false;

		}
		
	}

	public function delete($table,$record){
		$query = $this->db->delete($table,$record);
		if($query){
			return true;;
		}else{
			return false;
		}
	}

	public function count_record($table_name , $params=array()){
		$this->db->select("*");
		$this->db->from($table_name);

		if(array_key_exists("conditions", $params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}

			$query = $this->db->get();
			return $query->num_rows();

		}else{
			return false;
		}
	}

	public function dopayment(){

		if(!empty($this->input->post("amount"))){ 
			// Buyer information
			$firstName = $this->input->post("firstname");
			$lastName = $this->input->post("firstname");

			$city = 'Charleston';
			$zipcode = '25301';
			$countryCode = 'US';
			
			// Card details
			$creditCardNumber = trim(str_replace(" ","",$_POST['card_number']));
			$creditCardType = $_POST['card_type'];
			$expMonth = $_POST['expiry_month'];
			$expYear = $_POST['expiry_year'];
			$cvv = $_POST['cvv'];
			$amount = $this->input->post("amount");
			
			// Payment details
			$paypalParams = array(
				'paymentAction' => 'Sale',
				// 'itemName' => "productname",
			
				'amount' => $amount,
				'currencyCode' => "USD",
				'creditCardType' => $creditCardType,
				'creditCardNumber' => $creditCardNumber,
				'expMonth' => $expMonth,
				'expYear' => $expYear,
				'cvv' => $cvv,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'city' => $city,
				'zip'	=> $zipcode,
				'countryCode' => $countryCode,
			);
			
		$this->load->library('PaypalPro');
		return $response = $this->paypalpro->paypalCall($paypalParams); 
		}
	}


	public function mybalance($userid){

		return $this->db->query("SELECT sum(camount-damount) as blnc FROM `transaction` where users='$userid'")->result_array()[0]['blnc'];
	}

	
}





?>