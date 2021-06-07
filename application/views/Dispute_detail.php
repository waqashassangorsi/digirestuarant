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
    <form role="form" method="post" action="" class="form-horizontal form-groups-bordered">

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Job title</label>
            
            <div class="col-sm-5">
                <input type="text" readonly name="name" class="form-control" id="field-1" placeholder="Enter Name" required value="<?php echo $record['title'];?>">
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Subject</label>
            
            <div class="col-sm-5">
                <input type="text" name="cellno" value="<?php echo $record['subject'];?>" required class="form-control" id="field-1">
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Email</label>
            
            <div class="col-sm-5">
                <input type="text" name="cellno" value="<?php echo $record['email'];?>" required class="form-control" id="field-1">
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Description</label>
            
            <div class="col-sm-5">
                <textarea type="text" name="address" class="form-control"><?php echo $record['content'];?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">User Type</label>
            
            <div class="col-sm-5">
                <input type="text" name="cellno" value="<?php echo $record['user_type'];?>" required class="form-control" id="field-1">
            </div>
        </div>


    </form>	
</div>	
		
<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>



		
			
			