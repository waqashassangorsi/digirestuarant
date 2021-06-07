
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
			<th>Name</th>
			<th>Email</th>
			<th>Skype no</th>
			<th>WhatsApp no</th>
			<th>Content</th>
			<th>Files</th>
			<th>date</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($freelancers)){ 
					
				foreach ($freelancers as $key=>$value) {
						
        ?>
				<tr class="odd gradeX" id="row_<?php echo $value['id'];?>">
					<td><?php echo $i;?></td>
					<td><?php echo ucwords($value['name']); ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['skype']; ?></td>
					<td><?php echo $value['watsappno']; ?></td>
					<td><?php echo $value['content']; ?></td>
					<td>
						<?php if(!empty($value['files'])){?>
						<a href="<?php echo SURL.'Clients/downloadfile/'.$value['id'];?>" class="btn btn-info btn-sm btn-icon">
							Download Files
						</a>
						<?php }else{ echo "No Files.";}?>
						
					</td>
					<td><?php echo $value['date']; ?></td>
			
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


