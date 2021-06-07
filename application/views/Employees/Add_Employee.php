
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
<div class="panel-body">
				<form role="form" method="post" action="<?php echo base_url();?>Employee/Addemployee" class="form-horizontal form-groups-bordered">
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Employee Name</label>
						
						<div class="col-sm-5">
							<input type="text" name="name" class="form-control" id="field-1" placeholder="Enter Employee Name" required value="<?php echo ucwords($Employees->name);?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Employee Email Address</label>
						
						<div class="col-sm-5">
							<input type="email" name="email" class="form-control" placeholder="Enter Email Address" autocomplete="off" required value="<?php echo $Employees->email;?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Employee Password</label>
						
						<div class="col-sm-5">
							<input type="Password" name="pass" class="form-control" id="field-2" required>
						</div>
					</div>
					<?php 
						if(!empty($Employees->u_id)){
					?>
					<input type="hidden" name="edit" value="<?php echo $Employees->u_id;?>">
				    <?php } ?>
					<div class="panel-heading">
						<div class="panel-title h4">
							<b>Which Restaurants this user can manage?</b>
						</div>
					</div>
					<?php  foreach($reslist as $key=>$value){?>
						<div class="col-sm-4">
						<input type="checkbox" name="restaurants[]" value="<?php echo $value['id']; ?>" />
							<div class="tile-stats tile-red">
								<h3><?php echo $value['Name'];?></h3>
							</div>
							</a>
						</div>
					<?php }?>
					
					
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



		
			
			