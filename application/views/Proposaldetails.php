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
            <label for="field-1" class="col-sm-3 control-label">Freelancer name</label>
            
            <div class="col-sm-5">
                <input type="text" readonly value="<?php echo ucwords($record['f_name']." ".$record['l_name']);?>" required class="form-control" id="field-1">
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Job Budget</label>
            
            <div class="col-sm-5">
                <input type="text" readonly value="<?php echo $record['budget'];?>" required class="form-control" id="field-1">
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Freelancer Budget</label>
            
            <div class="col-sm-5">
                <input type="text" readonly value="<?php echo $record['my_proposed_amt'];?>" required class="form-control" id="field-1">
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Description</label>
            
            <div class="col-sm-5">
                <textarea class="form-control" readonly rows="4" style="width:100%;"><?php echo $record['content'];?></textarea>
            </div>
        </div>


    </form>	
</div>	
		
<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>



		
			
			