
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
	<li>			
		<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>
<div class="panel-heading">
	<div class="panel-title h4">
		<b>Link:</b> <?php echo SURL.'Screen/index/'.$this->uri->segment('3');?>
	</div>
				
</div>

<?php if(!empty($this->uri->segment("3"))){?>
			
<div style="text-align: right;">
	<a href="<?php echo base_url();?>Promotions/Add/<?php echo $this->uri->segment('3'); ?>" class="btn btn-success btn-icon">
		Add Promotion
		<i class="entypo-pencil"></i>
	</a>
</div>

<?php } ?>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>#</th>
			<th>Layout</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Actions</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		
		<?php 
			$i = 1;
			if(!empty($record)){ 
					
				foreach ($record as $value) {
				    
				    if($value['pro_type']=="1"){
						
        ?>
				        <tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><img src="<?php echo SURL.'assets/images/layout.jpeg';?>" style="width:100px;" class="img-responsive"/></td>
					<td><?php echo $value['start_Date']." ".$value['start_time']; ?></td>
					<td><?php echo $value['end_Date']." ".$value['end_time']; ?></td>
					<td class="center">
						<a href="<?php echo SURL."Promotions/editpromotionone/".$value['id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						<a href="javascript:void(0)" data-id1="<?php echo $value['id'];?>" class="btn btn-danger btn-sm btn-icon icon-left dlt">
							<i class="entypo-pencil"></i>
							Delete
						</a>

					</td>
					<td>
					    <?php 
					    $time = $value['end_Date']." ".$value['end_time'];
					    if($time > date("Y-m-d H:i:s")){
					    ?>
					    <button type="text" class="btn btn-success">Planned</button>
					    <?php
					    }else{
					    ?>
					    <button type="text" class="btn btn-info">Expire</button>
					    <?php } ?>
					</td>
				</tr>
				    <?php }else if($value['pro_type']=="2"){?>
				        <tr class="odd gradeX">
        					<td><?php echo $i;?></td>
        					<td><img src="<?php echo SURL.'assets/images/layout2.jpg';?>" style="width:100px;" class="img-responsive"/></td>
        					<td><?php echo $value['start_Date']." ".$value['start_time']; ?></td>
        					<td><?php echo $value['end_Date']." ".$value['end_time']; ?></td>
        					<td class="center">
        						<a href="<?php echo SURL."Promotions/editpromotionsecond/".$value['id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
        							<i class="entypo-pencil"></i>
        							Edit
        						</a>
        						<a href="javascript:void(0)" data-id1="<?php echo $value['id'];?>" class="btn btn-danger btn-sm btn-icon icon-left dltscnd">
        							<i class="entypo-pencil"></i>
        							Delete
        						</a>
        
        					</td>
        					<td>
        					    <?php 
        					    $time = $value['end_Date']." ".$value['end_time'];
        					    if($time > date("Y-m-d H:i:s")){
        					    ?>
        					    <button type="text" class="btn btn-success">Ongoing</button>
        					    <?php
        					    }else{
        					    ?>
        					    <button type="text" class="btn btn-info">Expire</button>
        					    <?php } ?>
        					</td>
        				</tr>
				    <?php }else if($value['pro_type']=="3"){ ?>
				        <tr class="odd gradeX">
        					<td><?php echo $i;?></td>
        					<?php if($value['type']=="Image"){?>
        					<td><img src="<?php echo SURL.$value['image'];?>" style="width:100px;" class="img-responsive"/></td>
        					<?php }else{?>
        					<td>
        					    <video width="120" height="120" controls>
                                  <source src="<?php echo SURL.$value['image'];?>" type="video/mp4">
                                  <source src="<?php echo SURL.$value['image'];?>" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
        					</td>
        					<?php } ?>
        					<td><?php echo $value['start_Date']." ".$value['start_time']; ?></td>
        					<td><?php echo $value['end_Date']." ".$value['end_time']; ?></td>
        					<td class="center">
        					    <?php 
        					    if($value['type']=="Image"){
        					        $url = "Promotions/editpromotionthrd/".$value['id'];
        					    }else{
        					        $url = "Promotions/editpromotionthrdvideo/".$value['id'];
        					    }
        					    ?>
        						<a href="<?php echo SURL.$url; ?>" class="btn btn-default btn-sm btn-icon icon-left">
        							<i class="entypo-pencil"></i>
        							Edit
        						</a>
        					
        						<a href="javascript:void(0)" data-id1="<?php echo $value['id'];?>" class="btn btn-danger btn-sm btn-icon icon-left dltthrd">
        							<i class="entypo-pencil"></i>
        							Delete
        						</a>
        
        					</td>
        					<td>
        					    <?php 
        					    $time = $value['end_Date']." ".$value['end_time'];
        					    if($time > date("Y-m-d H:i:s")){
        					    ?>
        					    <button type="text" class="btn btn-success">Ongoing</button>
        					    <?php
        					    }else{
        					    ?>
        					    <button type="text" class="btn btn-info">Expire</button>
        					    <?php } ?>
        					</td>
        				</tr>
				    <?php } ?>

		<?php $i++; }} ?>

		
	</tbody>
	
</table>

<script>
	$(document).on('click','.dlt',function(){
		var id = $(this).data("id1");
		var r=confirm("Are you sure you want to delete?");
		if(r==true){
			window.location.href="<?php echo SURL."Promotions/delete/";?>"+id;
		}
	});

	$(document).on('click','.dltscnd',function(){
		var id = $(this).data("id1");
		var r=confirm("Are you sure you want to delete?");
		if(r==true){
			window.location.href="<?php echo SURL."Promotions/deletescnd/";?>"+id;
		}
	});
	
	$(document).on('click','.dltthrd',function(){
		var id = $(this).data("id1");
		var r=confirm("Are you sure you want to delete?");
		if(r==true){
			window.location.href="<?php echo SURL."Promotions/deletethrd/";?>"+id;
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


