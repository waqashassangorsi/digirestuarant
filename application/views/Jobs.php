
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 
?>

<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo SURL; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	<li>			
		<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>




<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Job title</th>
			<th>Category</th>
			<th>Budget</th>
			<th>Posted date</th>
			<th>Acceptance</th>
			<th>Featured</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($freelancers)){ 
					
				foreach ($freelancers as $key=>$value) {
					$catname = $this->db->query("select * from categories where cat_id='".$value['cat_id']."'")->result_array()[0]['cat_name'];

					if($value['job_status']=="Awarded"){
						$jobstatus = "<input type='button' class='btn btn-success' value='Awarded'/>";
					}else{
						$jobstatus = "<input type='button' class='btn btn-info' value='Pending'/>";
					}

					if (strpos($value['project_type'], 'featured') !== false) {
						$isfeatured = "Featured";
					}else{
						$isfeatured = "Not Featured";
					}
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['job_id'];?>">
					<td><?php echo $i;?></td>
					<td><?php echo ucfirst($value['title']); ?></td>
					<td><?php echo $catname; ?></td>
					<td><?php echo $value['currency'].$value['budget']; ?></td>
					<td><?php echo $value['post_date']; ?></td>
					<td><?php echo $jobstatus; ?></td>
					<td><?php echo $isfeatured; ?></td>
					<td class="center">
						<?php if($value['is_approved'] == "0"){
						?>
						<a href="javascript:void(0)" data-id1="<?php echo $value['job_id']; ?>" class="btn btn-info btn-sm btn-icon icon-left aprove">
							<i class="entypo-cancel"></i>
							Approve
						</a>
						<a href="javascript:void(0)" data-id1="<?php echo $value['job_id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left dlt">
							<i class="entypo-cancel"></i>
							Reject
						</a>
						<?php	
						}else if($value['is_approved'] == "1"){
						?>	
						<a href="javascript:void(0)" data-id1="<?php echo $value['job_id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left dlt">
							<i class="entypo-cancel"></i>
							Reject
						</a>
						<?php
						}else{?>
					
						
						<a href="javascript:void(0)" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Rejected
						</a>

						<?php } ?>
						<a href="<?php echo SURL2."Searchjob/jobdetails/".$value['job_id'];?>" class="btn btn-success btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							View
						</a>
						<a href="<?php echo SURL."Proposal/jobproposals/".$value['job_id'];?>" class="btn btn-info btn-sm">
							Proposals
						</a>

						
			
						
					</td>
				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>

<script type="text/javascript">
	$(document).on('click','.dlt',function(){
		var id = $(this).data("id1");
		var response = confirm("Are You sure you want to reject this job?");
		if(response==true){
			window.location.href="<?php echo SURL.'Jobs/delete/'?>"+id;
		}else{

		}
		
		
	});

	$(document).on('click','.aprove',function(){
		var id = $(this).data("id1");
		var response = confirm("Are You sure you want to approve this job?");
		if(response==true){
			window.location.href="<?php echo SURL.'Jobs/approve/'?>"+id;
		}else{

		}
		
		
	});
</script>



<script type="text/javascript">
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
	});
</script>



<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>


