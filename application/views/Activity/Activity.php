
<?php 
require_once(APPPATH."views\includes/header.php"); 
require_once(APPPATH."views\includes/alerts.php"); 
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
<!-- =========================================search area starts here =========================================================-->
<style type="text/css">
.searching{width:550px; padding:14px; margin:0 auto;}
.searching div{padding:0}
</style>

<form class="row searching" method="post" action="Activity/">
	<div class="col-xs-2" style="padding-top:5px;">
		<label class="control-label">Start Date</label>
	</div>
	<div class="col-xs-3">
		<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="start_Date" value="<?php echo $start_date;?>"> 
	</div>
	<div class="col-xs-2" style="padding-top:5px;padding-left:15px;">
		<label class="control-label">End Date</label>
	</div>
	<div class="col-xs-3">
		<input type="text" class="form-control datepicker" name="end_Date" data-format="yyyy-mm-dd"   value="<?php echo $end_date;?>">
	</div>
	<div class="col-xs-2" style="padding-left:10px;">
		<button type="submit" class="btn btn-info btn-icon">
		  Search
		  <i class="entypo-search"></i>
		</button>
	</div>
</form>

<!-- =========================================search area ends here =========================================================-->


<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Date</th>
			<th>Status</th>
			<th>Caption</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($Activity)){ 
				$Activity = array_reverse($Activity);
					
				foreach ($Activity as $value) {
						
        ?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					
					<td><?php echo $value['act_date'];echo "&nbsp";echo "&nbsp"; echo $value['time']; ?></td>
					<td><?php echo $value['status']; ?></td>
					<td><?php echo $value['caption']; ?></td>
			
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
require_once(APPPATH."views\includes/footer.php"); 

 ?>
// <script type="text/javascript">
						
// 						$('.datepicker').datepicker({
// 						    format: 'yyyy/mm/dd'
// 						 });

// 					</script>

