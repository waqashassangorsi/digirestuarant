
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

<div class="panel-body">
    <form role="form" method="post" action="<?php echo base_url();?>Paymentsetting" class="form-horizontal form-groups-bordered">
        

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            
            <div class="col-sm-5">
                <input type="text" value="<?php echo $record['paypalclientid']; ?>" name="paypalclientid" class="form-control" required>
                <h6>Paypal Client ID.</h6>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            
            <div class="col-sm-5">
                <input type="text" value="<?php echo $record['paypalsecret'];  ?>" name="paypalsecret" class="form-control" required>
                <h6>Paypal Secret.</h6>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            
            <div class="col-sm-5">
                <input type="text" value="<?php echo $record['stripesecretkey']; ?>" name="stripesecretkey" class="form-control" required>
                <h6>Stripe Secret Key.</h6>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            
            <div class="col-sm-5">
                <input type="text" value="<?php echo $record['stripepublishablekey'];  ?>" name="stripepublishablekey" class="form-control" required>
                <h6>Stripe Publishable Key.</h6>
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



		
			
			