
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
	<li>			
		<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
				<div class="panel-title h4">
					<b><?php echo $Controller_name;?></b>
				</div>
				
</div>

<script src="assets/js/select2/select2.min.js"></script>
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">

<div class="panel-body">
	<form role="form" method="post" action="<?php echo base_url();?>Category/Addcategory" class="form-horizontal form-groups-bordered">
		
		<div class="form-group hidden">
			<label class="col-sm-3 control-label">Parent Category</label>
			
			<div class="col-sm-5">
				
				<select name="parentcat" class="select2 form-control" data-allow-clear="true" data-placeholder="Select Parent Category..." required>
					<option>None</option>
					
					<?php foreach($categories as $key=>$value){ if(isset($edit)){if($value['cat_id'] == $edit){ continue;}} ?>
						<option <?php if(isset($edit)){if($value['cat_id'] == $cat_id){ echo "selected";}}?> value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?>
						</option>
						
					
					<?php } ?>
				</select>
				
			</div>
		</div>

		<?php if(isset($edit)){ ?>
			<input type="hidden" value="<?php echo $edit;?>" name="edit"/>	
		<?php } ?>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Category Name</label>
			
			<div class="col-sm-5">
				<input type="text" value="<?php if(isset($name)){ echo $name;} ?>" name="name" class="form-control" id="field-1" placeholder="Enter Category Name" required>
				<!-- <h6 style="color:red;d">*If No parent category,then select None in parent category* </h6> -->
			</div>
		</div>
		

		<div class="form-group hidden">
			<label for="field-1" class="col-sm-3 control-label">Status</label>
			
			<div class="col-sm-5">
				<select class="form-control" name="status">
					<option <?php if(isset($status)){if($status == "Active"){ echo "selected";}}?>>Active</option>
					<option <?php if(isset($status)){if($status == "InActive"){ echo "selected";}}?>>InActive</option>
				</select>
			</div>
		</div>

		
		
		
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="Submit" name="Submit" class="btn btn-red">Save</button>
			</div>
		</div>
	</form>

				
</div>
		

<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>



		
			
			