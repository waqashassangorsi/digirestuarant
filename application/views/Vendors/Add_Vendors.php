
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
	<li>			
		<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>
<div class="panel-body">
				<form role="form" method="post" action="<?php echo base_url();?>Vendor/Addvendor" class="form-horizontal form-groups-bordered">
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Vendor Name</label>
						
						<div class="col-sm-5">
							<input type="text" name="name" class="form-control" id="field-1" placeholder="Enter Name" required value="<?php if(isset($record->name)){ echo ucwords($record->name);}?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Vendor Address</label>
						
						<div class="col-sm-5">
							<input type="text" name="address" class="form-control" placeholder="Enter Address" autocomplete="off" required value="<?php if(isset($record->address)){ echo $record->address;}?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Vendor Cell #</label>
						
						<div class="col-sm-5">
							<input type="number" name="cellno" value="<?php if(isset($record->cell_no)){ echo $record->cell_no;}?>" required class="form-control" id="field-1">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Vendor Opening Balance (Rs)</label>
						
						<div class="col-sm-5">
							<input type="text" name="opngbl" value="<?php if(isset($record->opngbl)){ echo $record->opngbl;}?>" required class="form-control" id="field-1">
							
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Opening Type</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="status">
								<option value="Payable" <?php if(isset($record->status)){ if($record->status == "Payable"){ echo "selected";}}?>>Payable</option>
								<option value="Receiveable"  <?php if(isset($record->status)){ if($record->status == "Receiveable"){ echo "selected";}}?>>Receiveable</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Vendor Status</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="vendor_status">
								<option value="Active" <?php if(isset($record->vendor_status)){ if($record->vendor_status == "Active"){ echo "selected";}}?>>Active</option>
								<option value="InActive"  <?php if(isset($record->vendor_status)){ if($record->vendor_status == "InActive"){ echo "selected";}}?>>InActive</option>
							</select>
						</div>
					</div>


					<?php 
						if(isset($edit)){
					?>
					<input type="hidden" name="edit" value="<?php echo $edit;?>">
				    <?php } ?>

					

					
					
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="Submit" name="Submit" class="btn btn-red">Save</button>
						</div>
					</div>
				</form>

				
			</div>
		

<?php
require_once(APPPATH."views\includes/footer.php"); 

 ?>



		
			
			