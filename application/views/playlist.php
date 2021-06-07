
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 
?>
<style>
@media only screen and (max-width: 600px) {
  #table-1_filter input{width: 70px;}
}
</style>
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo SURL; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	<!--<li>			-->
	<!--	<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>-->
	<!--</li>-->
	
</ol>

<!--<div class="panel-heading">-->
<!--	<div class="panel-title h4">-->
<!--		<b><?php echo $Controller_name;?></b>-->
<!--	</div>-->
				
<!--</div>-->

			
<div style="text-align: right;">
	<a href="<?php echo base_url();?>Playlist/Add/<?php echo $this->uri->segment("3");?>" class="btn btn-success btn-icon">
		Add
		<i class="entypo-pencil"></i>
	</a>
</div>


<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Link</th>
			<th>View Promotions</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($record)){ 
					
				foreach ($record as $value) {
						
        ?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $value['name'];?></td>
					<td><?php echo SURL.'Screen/index/'.$value['id'];?></td>
					<td>
					    <a href="<?php echo SURL."Promotions/index/".$value['id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							View
						</a>
					</td>
					<td class="center">
						<a href="<?php echo SURL."Playlist/edit/".$value['id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						<a href="javascript:void(0)" data-id1="<?php echo $value['id'];?>" class="btn btn-danger btn-sm btn-icon icon-left dlt">
							<i class="entypo-pencil"></i>
							Delete
						</a>

					</td>
				</tr>

		<?php $i++; }} ?>

		
					
		
	</tbody>
	
</table>

<script>
	$(document).on('click','.dlt',function(){
		var id = $(this).data("id1");
		var r=confirm("Are you sure you want to delete?");
		if(r==true){
			window.location.href="<?php echo SURL."Playlist/delete/";?>"+id;
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


