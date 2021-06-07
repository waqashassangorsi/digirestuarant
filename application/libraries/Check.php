<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function validity($CI){
		$valid="no";
		if($CI->router->class == "Dashboard"){
			$valid="yes";
		}else if($CI->router->class == "Promotions"){
			$valid="yes";
		}
		return $valid;
	}
 class Check{
	 
	public function Login(){
		$CI =& get_instance();
		$CI->load->model('common');

		if((!$CI->session->userdata('LoggedIn')) &&(!$CI->session->userdata('distributor'))){
			$CI->session->sess_destroy();
			redirect("Login");
			exit();
		}

		// $con['conditions'] = array('user_status'=>'Admin'); 
		// $checkowner = $CI->common->get_single_row("users",$con);

		$checkowner = $CI->db->query("select * from users where user_status in('Admin','Employee')");
		if($checkowner->num_rows() > 0){ 
			$con['conditions'] = array('u_id' =>  $CI->session->userdata['distributor']); 

			$user = $CI->common->get_single_row("users",$con);
			//echo "1.".$CI->router->directory."\n";
			//echo "2.".$CI->router->class."\n";
			//echo "3.".$CI->router->method.".\n";
			//exit();
			if($user){
				$valid=validity($CI);
					if($valid == "yes" || ($user->user_status == "Admin")){
						//echo "in with ".$valid;
					}else{
						$con['conditions'] = array('pageurl' =>  htmlspecialchars($CI->router->fetch_class())); 
						$page_id = $CI->common->get_single_row("submenu",$con)->id;

						if($page_id == 2){
							$CI->session->set_flashdata('fail','you are not authorized to view this page.');
							redirect("Dashboard");
						}
						//echo "Page:".$page_id;
						$con['conditions'] = array('page_id' => $page_id,"u_id"=>$user->u_id); 
						$rights = $CI->common->get_single_row("user_rights",$con);
						echo var_dump($rights);
						if($rights){

						}else{
							$CI->session->set_flashdata('fail','you are not authorized to view this page. Ask your admin to give you access');
							redirect("Dashboard");
						}
					}
				
				return $user;
			}else{
				$CI->session->set_flashdata('fail','you have been deleted or banned from using this website.');
				redirect("Login");
			}
			
		}else{
			$CI->session->set_flashdata('fail','Your account has disabled or something went wrong.');
			redirect("Login");
			
		}
	}
	
	function timeAgo($time_ago){
			
			$cur_time   = time();
			$time_elapsed   = $cur_time - $time_ago;
			$seconds    = $time_elapsed ;
			$minutes    = round($seconds / 60 );
			$hours      = round($seconds / 3600);
			$days       = round($seconds / 86400 );
			$weeks      = round($seconds / 604800);
			$months     = round($seconds / 2600640 );
			$years      = round($seconds / 31207680 );
			// Seconds
			if($seconds <= 60){
			    return "Just now";
			}
			//Minutes
			else if($minutes <=60){
			    if($minutes==1){
			        return "1 minute";
			    }
			    else{
			        return "$minutes minutes";
			    }
			}
			//Hours
			else if($hours <=24){
			    if($hours==1){
			        return "an hour";
			    }else{
			        return "$hours hrs";
			    }
			}
			//Days
			else if($days <= 7){
			    if($days==1){
			        return "Yesterday at"." ".date("H:ia",$time_ago) ;
			    }else{
			        return "$days days";
			    }
			}
			//Weeks
			else if($weeks <= 4.3){
			    if($weeks==1){
			        return "A week";
			    }else{
			        return "$weeks weeks";
			    }
			}
			//Months
			else if($months <=12){
			    if($months==1){
			        return "A month";
			    }else{
			        return "$months months";
			    }
			}
			//Years
			else{
			    if($years==1){
			        return "One year";
			    }else{
			        return "$years years";
			    }
			}
		}
}
?>