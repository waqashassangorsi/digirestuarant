
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
			<th>Freelancer Name</th>
			<th>Job title</th>
			<th>Budget</th>
			<th>Freelancer Budget</th>
			<th>Status</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($proposals)){ 
					
				foreach ($proposals as $key=>$value) {
					
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['msg_id'];?>">
					<td><?php echo $i;?></td>
					<td><?php echo ucfirst($value['f_name']." ".$value['l_name']); ?></td>
					<td><?php echo $value['title']; ?></td>
					<td><?php echo $value['budget']; ?></td>
					<td><?php echo $value['my_proposed_amt']; ?></td>
					<td><?php echo $value['proposal_Status']; ?></td>
					<td><?php echo $value['post_date']; ?></td>
					<td class="center">
						<a href="<?php echo SURL."Proposal/proposaldetails/".$value['msg_id'];?>" class="btn btn-info">View</a>
						
					</td>
				</tr>

		<?php $i++; }} ?>
					
		
	</tbody>
	
</table>


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


