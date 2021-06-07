
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
			<th>Category</th>
			<th>Budget</th>
			<th>Posted date</th>
			<th>Acceptance</th>
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
                    
                    $users = $this->db->query("select * from users where u_id='".$value['u_id']."'")->result_array()[0];
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['job_id'];?>">
					<td><?php echo $i;?></td>
                    <td><?php echo ucwords($users['f_name']." ".$users['l_name']); ?></td>
					<td><?php echo ucfirst($value['title']); ?></td>
					<td><?php echo $catname; ?></td>
					<td><?php echo $value['currency'].$value['budget']; ?></td>
					<td><?php echo $value['post_date']; ?></td>
					<td><?php echo $jobstatus; ?></td>
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


