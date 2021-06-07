
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
	<form role="form" method="post" action="<?php echo base_url();?>Disputes/Add" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">I can</label>
			
			<div class="col-sm-5">
				<input type="text" name="title" class="form-control" id="field-1" placeholder="e.g I can design a logo for you" required value="<?php echo str_replace("I can","",$record['title']);?>">
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Amount</label>
			
			<div class="col-sm-5">
				<input type="text" name="amount" class="form-control" placeholder="Enter Amount" autocomplete="off" required value="<?php echo $record['amount'];?>">
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">WHEN YOU WILL DELIVER THE OFFER?</label>
			
			<div class="col-sm-5">
				<select class="form-control" name="days">
					<option value="1" <?php if($record['delivery_day'] == "1"){ echo "selected";}?>>1 Day</option>
					<option value="2" <?php if($record['delivery_day'] == "2"){ echo "selected";}?>>2 Day</option>
					<option value="3" <?php if($record['delivery_day'] == "3"){ echo "selected";}?>>3 Day</option>
					<option value="4" <?php if($record['delivery_day'] == "4"){ echo "selected";}?>>4 Day</option>
					<option value="5" <?php if($record['delivery_day'] == "5"){ echo "selected";}?>>5 Day</option>
					<option value="6" <?php if($record['delivery_day'] == "6"){ echo "selected";}?>>6 Day</option>
					<option value="7" <?php if($record['delivery_day'] == "7"){ echo "selected";}?>>7 Day</option>
					<option value="8" <?php if($record['delivery_day'] == "8"){ echo "selected";}?>>8 Day</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Category</label>
			
			<div class="col-sm-5">
				<select class="form-control" name="cat">
					<?php foreach($cat as $key=>$value){?>
					<option value="<?php echo $value['cat_id']; ?>" <?php if($record['cat'] == $value['cat_id']){ echo "selected";}?>><?php echo $value['cat_name'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">PROVIDE MORE DETAIL ABOUT YOUR OFFER</label>
			
			<div class="col-sm-5">
				<textarea class="form-control" rows="5" name="details"><?php echo $record['details'];?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Upload File</label>
			
			<div class="col-sm-5">
				<?php if(!empty($record['service_id'])){
					$required = "";
				 }else{
				 	$required = "required";
				 } ?>
				<input type="file" name="files[]" class="form-control" accept="image/*" multiple="" <?php echo $required;?>>
			</div>
			<?php 
				if(!empty($record['porfolio'])){
					$files = explode("_+.==",$record['porfolio']);
					//echo "<pre>";var_dump($files);
					foreach($files as $key=>$value){
						
						if($value==""){
							continue;
						}

			?>
				<div class="col-xs-2">
					<img src="<?php echo SURL.$value;?>" style="border:1px solid black;" class="img-responsive" style="width:50px;height: 50px;" />
				</div>	
			<?php }} ?>
		</div>
		<?php 
			if(!empty($record['service_id'])){
		?>
		<input type="hidden" name="edit" value="<?php echo $record['service_id'];?>">
	    <?php } ?>


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



		
			
			