
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
				<form role="form" method="post" action="Product/add" class="form-horizontal form-groups-bordered">
	
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Vendor name</label>
						
						<div class="col-sm-5">
							<select name="vendor" class="select2 form-control" data-allow-clear="true" data-placeholder="Select Category..." required>

								<?php foreach($vendor as $key=>$value){ if(isset($edit)){if($value['cat_id'] == $edit){ continue;}} ?>
									<option <?php if(isset($edit)){if($value['cat_id'] == $cat_id){ echo "selected";}}?> value="<?php echo $value['v_id'];?>">
										<?php echo $value['name'];?>
									</option>
									
								
								<?php } ?>
							</select>
						</div>
					</div>
					<?php 
						if(isset($edit)){
					?>
					<input type="hidden" name="edit" value="<?php echo $edit;?>">
				    <?php } ?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Category</label>
						
						<div class="col-sm-5">
							<select name="cat" class="select2 form-control" data-allow-clear="true" data-placeholder="Select Category..." required>
								
								<?php foreach($categories as $key=>$value){ if(isset($edit)){if($value['cat_id'] == $edit){ continue;}} ?>
									<option <?php if(isset($edit)){if($value['cat_id'] == $cat_id){ echo "selected";}}?> value="<?php echo $value['cat_id'];?>"><?php echo $value['name'];?>
									</option>
									
								
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Product Name</label>
						
						<div class="col-sm-5">
							<input type="text" name="name" class="form-control" id="field-1" placeholder="Enter  Product Name" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Invoice Price</label>
						
						<div class="col-sm-5">
							<input type="text" min='0' max='10' name="invoice_price" class="form-control" id="field-1" placeholder="Invoice price" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Retail Price</label>
						
						<div class="col-sm-5">
							<input type="number" name="retail_price" class="form-control" id="field-1" placeholder="Retail price" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Whole Sale Price</label>
						
						<div class="col-sm-5">
							<input type="number" name="whole_sale_price" class="form-control" id="field-1" placeholder="Whole Sale price" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Discount(%)</label>
						
						<div class="col-sm-5">
							<input type="number" name="discount" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Opening balance</label>
						
						<div class="col-sm-5">
							<input type="text" name="opngbl" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Cotton Packing</label>
						
						<div class="col-sm-5">
							<input type="number" name="ctn_packing" class="form-control" required>
							<span style="color:red;">No of pieces in a cotton</span>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Product Status</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="status">
								<option>Active</option>
								<option>InActive</option>
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



		
			
			