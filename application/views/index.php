<?php 
require_once("includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 
?>


<div class="row" style="padding-left:35px;padding-right:35px;">
    
<?php   if($this->router->fetch_method()=="index" || $this->router->fetch_method()==""){?>
    <h3 style="padding-left:15px;">All Restuarants</h3>
     <?php  foreach($record as $key=>$value){?>
    	<div class="col-sm-4">
    	    <a href="<?php echo SURL.'Dashboard/playlist/'.$value['id'];?>"> 
    		<div class="tile-stats tile-red">
    			
    			
    			<h3><?php echo $value['Name'];?></h3>
    		</div>
    		</a>
    		
    	</div>
<?php } ?>
        <div class="col-sm-4">
    	    <a href="<?php echo SURL.'Restaurant/Add';?>" width="10"> 
    		<div class="tile-stats tile-aqua" width="10">
    			<h3>Add Restaurant</h3>
    		</div>
    		</a>
    	</div>
<?php }else{ ?>
        <?php 
            $restuarantname = $this->db->query("select * from Restaurant where id='".$this->uri->segment('3')."'")->result_array()[0];
            
        ?>
        <h3 style="padding-left:15px;">
            <?php echo $restuarantname['Name']." Screens"; ?>
            <a href="<?php echo SURL.'Restaurant/edit/'.$restuarantname['id'];?>" style="font-size:14px;"><span class="glyphicon glyphicon-pencil"></span></a>
    
        </h3>
        <?php  foreach($record as $key=>$value){?>
        	<div class="col-sm-4">
        	    <a href="<?php echo SURL.'Promotions/index/'.$value['id'];?>">
            		<div class="tile-stats tile-red">
            			<h3><?php echo $value['name'];?></h3>
            			<!--<a href="<?php echo SURL.'Screen/index/'.$value['id'];?>" style="margin-top:10px;"><?php echo SURL.'Screen/index/'.$value['id'];?></a>-->
            		</div>
        		</a>
        	</div>
        <?php } ?>
	<div class="col-sm-4">
        <a href="<?php echo SURL.'Playlist/Add/'.$restuarantname['id'];?>">
            <div class="tile-stats tile-aqua">
                <h3>Add Screen</h3>
        	</div>
        </a>
	</div>
<?php } ?>

</div>
<br />
<?php  require_once("includes/footer.php"); 

 ?>
