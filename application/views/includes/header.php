<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- <meta name="description" content="" />
	<meta name="author" content="" /> -->
	
	<title>Restuarant Dashboard</title>
	
	<base href="<?php echo base_url(); ?>"> 
	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body  page-fade gray">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
	<?php require_once("siderbar.php"); ?>
	
	<div class="main-content">
		
<div class="row">
	
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">
		
		<ul class="user-info pull-left pull-right-xs pull-none-xsm hidden">
			
			<!-- Raw Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle noti" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-attention"></i>
					<span class="badge badge-info count_noti"><?php //if($notifications > 0){ echo $notifications; } ?></span>
				</a>
				
				<ul class="dropdown-menu">
					<li class="top">
						<?php //if($notifications > 0){ ?>
						<style type="text/css">
						.status_line{color:black;}
						</style>	
						<p class="small">
							You have <strong><?php //echo $notifications;?></strong> new notifications.
						</p>
						<?php //} ?>
					</li>

					<?php
						// $con['conditions'] = array("company_id" => $this->session->userdata['companyid']);
						// $query = $this->common->get_rows_by_limit("activity", $con,'act_id','5','DESC');
						// foreach($query as $key => $value){
					
					 ?>
				 

					<li>
						<ul class="dropdown-menu-list scroller">
							<li class="unread notification-success">
								<a href="javascript:void(0)">
									<i class="entypo-user-add pull-right"></i>
									
									<span class="line status_line">
										<?php //echo $value['caption'];?>
									</span>
									
									<span class="line small">
										<?php

										 //echo ucfirst($this->check->timeAgo(strtotime($value['act_date']." ".$value['time']))); 
										?>
										ago
									</span>
								</a>
							</li>
							
							
						</ul>
					</li>
					<?php //} ?>

					<li class="external">
						<a href="Activity/">View all notifications</a>
					</li>				
				</ul>
				
			</li>
						
		
		
		</ul>
	
	</div>
	
	
	
	
</div>

<hr />
<script type="text/javascript">
jQuery(document).ready(function($) 
{
	// Sample Toastr Notification
	setTimeout(function()
	{			
		var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
			"toastClass": "black",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		// toastr.success("You have been awarded with 1 year free subscription. Enjoy it!", "Account Subcription Updated", opts);
	}, 3000);
	
	// Sparkline Charts
	$(".top-apps").sparkline('html', {
	    type: 'line',
	    width: '50px',
	    height: '15px',
	    lineColor: '#ff4e50',
	    fillColor: '',
	    lineWidth: 2,
	    spotColor: '#a9282a',
	    minSpotColor: '#a9282a',
	    maxSpotColor: '#a9282a',
	    highlightSpotColor: '#a9282a',
	    highlightLineColor: '#f4c3c4',
	    spotRadius: 2,
	    drawNormalOnTop: true
	 });

	$(".monthly-sales").sparkline([1,5,6,7,10,12,16,11,9,8.9,8.7,7,8,7,6,5.6,5,7,5,4,5,6,7,8,6,7,6,3,2], {
		type: 'bar',
		barColor: '#ff4e50',
		height: '55px',
		width: '100%',
		barWidth: 8,
		barSpacing: 1
	});	
	
	$(".pie-chart").sparkline([2.5,3,2], {
	    type: 'pie',
	    width: '95',
	    height: '95',
	    sliceColors: ['#ff4e50','#db3739','#a9282a']
	});
    
    
	$(".daily-visitors").sparkline([1,5,5.5,5.4,5.8,6,8,9,13,12,10,11.5,9,8,5,8,9], {
	    type: 'line',
	    width: '100%',
	    height: '55',
	    lineColor: '#ff4e50',
	    fillColor: '#ffd2d3',
	    lineWidth: 2,
	    spotColor: '#a9282a',
	    minSpotColor: '#a9282a',
	    maxSpotColor: '#a9282a',
	    highlightSpotColor: '#a9282a',
	    highlightLineColor: '#f4c3c4',
	    spotRadius: 2,
	    drawNormalOnTop: true
	 });


	$(".stock-market").sparkline([1,5,6,7,10,12,16,11,9,8.9,8.7,7,8,7,6,5.6,5,7,5], {
	    type: 'line',
	    width: '100%',
	    height: '55',
	    lineColor: '#ff4e50',
	    fillColor: '',
	    lineWidth: 2,
	    spotColor: '#a9282a',
	    minSpotColor: '#a9282a',
	    maxSpotColor: '#a9282a',
	    highlightSpotColor: '#a9282a',
	    highlightLineColor: '#f4c3c4',
	    spotRadius: 2,
	    drawNormalOnTop: true
	 });

	 
	 $("#calendar").fullCalendar({
		header: {
			left: '',
			right: '',
		},
		
		firstDay: 1,
		height: 200,
	});
});


function getRandomInt(min, max) 
{
	return Math.floor(Math.random() * (max - min + 1)) + min;
}
</script>


<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">