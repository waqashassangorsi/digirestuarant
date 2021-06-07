
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

<style type="text/css">
.wrpr_details div{padding: 0;}
.totalbillswrpr div{padding: 0;margin: 0;}
.totalbillswrpr{margin-top: 30px;}
.allitemswrpr div{padding: 0;margin: 0;}
.wrpr_details h6{background: #5090C1; padding: 10px 0 10px 4px; color: white; margin:0;}
.addeditems{background:#F2F2F2;color: white; margin-top: 30px;}
</style>

<div class="panel-body">
	<form role="form" method="post" action="Product/add" class="form-horizontal validate form-groups-bordered">

		
		<?php 
			if(isset($edit)){
		?>
		<input type="hidden" name="edit" value="<?php echo $edit;?>">
		<?php } ?>


		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Date</label>
			
			<div class="col-xs-5">
				<input type="text" autocomplete="off" class="form-control datepicker" data-format="yyyy-mm-dd" name="start_Date" value="<?php echo $start_date;?>"> 
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Remarks</label>
			
			<div class="col-sm-5">
				<textarea class="form-control autogrow" id="field-ta" placeholder="Any Remarks" 
				style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 48px;"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label">Unit Price</label>
			
			<div class="col-sm-5">
				<input type="number" data-validate="required" data-message-required="This is custom message for required field."  
				name="singlepieceprice" class="form-control" id="field-1">
			</div>
		</div>	


		<div class="row wrpr_details">
			<div class="col-xs-3">
				<h6>Product Name</h6>
				<select name="item" id="item" class="form-control">
					
					<?php foreach($product as $key=>$value){ if(isset($edit)){if($value['cat_id'] == $edit){ continue;}} ?>
						<option <?php if(isset($edit)){if($value['cat_id'] == $cat_id){ echo "selected";}}?> value="<?php echo $value['p_id'];?>"><?php echo $value['p_name'];?>
						</option>
						
					
					<?php } ?>
				</select>

			</div>

			<div class="col-xs-1">
				<h6>Rcv Qty</h6>
				<input type="number" id="rcvqty" class="form-control" placeholder="" required>

			</div>

			<div class="col-xs-1">
				<h6>GST %</h6>
				<input type="number" id="gst" class="form-control" placeholder="" required>

			</div>

			<div class="col-xs-2">
				<h6>GST Amount</h6>
				<input type="number" id="gstamt" class="form-control" placeholder="" required>

			</div>

			<div class="col-xs-2">
				<h6>Exc GST Amt</h6>
				<input type="number" id="exgstamt" class="form-control" placeholder="" required>

			</div>

			<div class="col-xs-2">
				<h6>Inc GST Amt</h6>
				<input type="number" id="ingstamt" class="form-control" placeholder="" required>

			</div>
			<div class="col-xs-1 text-center">
				<h6 style="background:#82AF6F;">Action</h6>
				<button type="Button" name="Submit" class="btn btn-info additems">Add</button>

			</div>	
		</div>

		<div class="row addeditems"> 
			<div class="col-xs-3">
				<h6>Product Name</h6>

			</div>

			<div class="col-xs-1">
				<h6>Rcv Qty</h6>
			</div>

			<div class="col-xs-1">
				<h6>GST %</h6>

			</div>

			<div class="col-xs-2">
				<h6>GST Amount</h6>

			</div>

			<div class="col-xs-2">
				<h6>Exc GST Amt</h6>

			</div>

			<div class="col-xs-2">
				<h6>Inc GST Amt</h6>

			</div>
			<div class="col-xs-1 text-center">
				
			</div>	
		</div>				
		<div class="row allitemswrpr">
			<div class="col-xs-1">
				<input type="number" name="singlepieceprice" class="form-control" id="field-1" placeholder="" required>

			</div>

			<div class="col-xs-1">
				<input type="number" name="singlepieceprice" class="form-control" id="field-1" placeholder="" required>

			</div>

			<div class="col-xs-2">
				<input type="number" name="singlepieceprice" class="form-control" id="field-1" placeholder="" required>

			</div>

			<div class="col-xs-2">
				<input type="number" name="singlepieceprice" class="form-control" id="field-1" placeholder="" required>

			</div>

			<div class="col-xs-2">
				<input type="number" name="singlepieceprice" class="form-control" id="field-1" placeholder="" required>

			</div>
			<div class="col-xs-1 text-center">
				<button type="Submit" name="Submit" class="btn btn-info">Add</button>

			</div>
		</div>
		

		<div class="totalbillswrpr row">
			<div class="col-xs-8">
			</div>	

			<div class="col-xs-4" style="border:1px solid #ccc; background:#ddd;">
				<h4>Bills Details</h4>
				<div class="row" style="background:#848484;">
					<h4 class="col-xs-4" style="color:white;">
						Total Bill
					</h4>
					
					<div class="col-xs-8">
						<input type="text" valu="" class="form-control"/>
					</div>	
				</div>	
				<div class="row" style="background:#5090C1;">
					<h4 class="col-xs-4" style="color:white;">
						Discount
					</h4>
					
					<div class="col-xs-8">
						<input type="text" valu="" class="form-control"/>
					</div>	
				</div>	
				<div class="row">
					<h4 class="col-xs-4">
						Net Payable
					</h4>
					
					<div class="col-xs-8">
						<input type="text" valu="" class="form-control"/>
					</div>	
				</div>
				<div class="row">
					<h4 class="col-xs-4">
						Pay Mode
					</h4>
					
					<div class="col-xs-8">
						<input type="text" valu="" class="form-control"/>
					</div>	
				</div>
				<div class="row">
					<h4 class="col-xs-4">
						Amount Paid
					</h4>
					
					<div class="col-xs-8">
						<input type="text" valu="" class="form-control"/>
					</div>	
				</div>
				<div class="row">
					<h4 class="col-xs-4">
						Cash In Hand
					</h4>
					
					<div class="col-xs-8">
						<input type="text" valu="" class="form-control"/>
					</div>	
				</div>	
			</div>	
		</div>	
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="Submit" name="Submit" class="btn btn-red">Save</button>
			</div>
		</div>
	</form>

				
</div>

<script type="text/javascript">

	$(document).on("click",".additems",function(){ alert('asdf');
		var rcvqty = $("#rcvqty").val();
		var gst = $("#gst").val();
		var gstamt = $("#gstamt").val();
		var exgstamt = $("#exgstamt").val();
		var ingstamt = $("#ingstamt").val();

		$(".allitemswrpr").append('<div class="col-xs-3">
			<input type="number" name="singlepieceprice" class="form-control">

		</div>');

		// var mhthml = '<div class="col-xs-3">
		// 	<input type="number" name="singlepieceprice" class="form-control">

		// </div>';

		

		alert('<div class="col-xs-3">
			<input type="number" name="singlepieceprice" class="form-control">

		</div>');


	});

</script>		

<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>



		
			
			