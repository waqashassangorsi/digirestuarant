
<?php 
require_once(APPPATH."views/includes/header.php"); 
require_once(APPPATH."views/includes/alerts.php"); 
?>

<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo SURL; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	<!--<li>			-->
	<!--	<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>-->
	<!--</li>-->
	<!--<li>			-->
	<!--	<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>-->
	<!--</li>-->
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>

<style>
    legend.scheduler-border {
        width:inherit; /* Or auto */
        padding:0 10px; /* To give a bit of padding on the left and right */
        border-bottom:none;
    }
    fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
}
.upload-button{
    padding-top: 31px;
}
</style>
<div class="panel-body">
	<form role="form" method="post" id="promotionform" action="Promotions/addpromotion" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	
        <?php 
            if(!empty($record)){
        ?>
        <input type="hidden" name="edit" value="<?php echo $record['id'];?>">
        <?php } ?>
        
        <fieldset class="scheduler-border">
            <legend  class="scheduler-border">Choose Layout:</legend>
            <div class="form-group">
                <?php foreach($images as $key=>$value){?>
                <div class="col-xs-3">
                    <input type="radio" <?php if($this->uri->segment("3")==$value['image_id']){echo "checked";}?> class="chkimg" name="versiontype" required value="<?php echo $value['image_id'];?>"/> <img src="<?php echo SURL.$value['image'];?>" class="img-responsive"/>
                </div>
                
                <?php } ?>
                
                <div class="col-xs-3 upload-button">
                    <?php 
                      if(!empty($record)){
                    ?>
                    <input type="radio" <?php if($editimage==3){echo "checked";}?> class="chkimg" name="versiontype" required value="3"/> 
                    <?php }else{?>
                     <input type="radio" <?php if($this->uri->segment("3")=='3' && isset($_GET['id'])){echo "checked";}?> class="chkimg" name="versiontype" required value="3"/> 
                    <?php } ?>
                    <h5><a href="javascript:void(0)" class="btn btn-info">Upload Image</a></h5>
                   
                </div>
               
                
                <div class="col-xs-3 upload-button">
                     <?php 
                      if(!empty($record)){
                    ?>
                    <input type="radio" <?php if($editimage==4){echo "checked";}?> class="chkimg" name="versiontype" required value="4"/> 
                    <?php }else{?>
                    <input type="radio" <?php if($this->uri->segment("3")=='4'  && isset($_GET['id'])){echo "checked";}?> class="chkimg" name="versiontype" required value="4"/> 
                    <?php } ?>
                    <h5><a href="javascript:void(0)" class="btn btn-info">Upload Video</a></h5>
                   
                </div>
                
            </div>
        </fieldset>
        
        
        <?php 
        if(!empty($edit)){ 
            if($edit==1){
                require_once(APPPATH."views/includes/firstpromotionlayout.php");
            }else if($edit==2){
                require_once(APPPATH."views/includes/secondpromotionlayout.php");
            }
            else if($edit==3){
                require_once(APPPATH."views/includes/imagepromotion.php");
            }
            else if($edit==4){
                require_once(APPPATH."views/includes/videopromotion.php");
            }
        ?>
        <div class="form-group">
            <div class="col-sm-12 text-center">
                <button type="submit" name="Submit" id="submit" class="btn btn-red">Post</button>
            </div>
        </div>
        
        <?PHP
        
        }else{
            if($this->uri->segment("3")==1 && isset($_GET['id'])){

                require_once(APPPATH."views/includes/firstpromotionlayout.php"); 

            }else if($this->uri->segment("3")==2 && isset($_GET['id'])){
                require_once(APPPATH."views/includes/secondpromotionlayout.php"); 
            }
            else if($this->uri->segment("3")==3 && isset($_GET['id'])){
                require_once(APPPATH."views/includes/imagepromotion.php"); 
            }
            else if($this->uri->segment("3")==4 && isset($_GET['id'])){
                require_once(APPPATH."views/includes/videopromotion.php"); 
            }
            
            if(isset($_GET['id'])){
        ?>
        
        <div class="form-group">
            <div class="col-sm-12 text-center">
                <button type="submit" name="Submit" id="submit" class="btn btn-red">Post</button>
            </div>
        </div>
        
        <?php
        
        }
            
        }
        ?>
        

        
    </form>
				
</div>

 <div id="targetLayer" style="display:none;"></div>
 
<style>
    #outerwrpr{display:none;}
    .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
  margin:0 auto;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<div id="outerwrpr">
    <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="0"
      aria-valuemin="0" aria-valuemax="100">
        0%
      </div>
    </div>
    <div class="loader"></div>

</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>


<script>
$(document).ready(function(){
 $('#promotionform123').submit(function(event){
   event.preventDefault();
   $('#targetLayer').hide();
   $(this).ajaxSubmit({
    target: '#targetLayer',
    async: true,
    beforeSubmit:function(){
     $("#outerwrpr").show();
     $('.progress-bar').width('0%');
    },
    uploadProgress: function(event, position, total, percentageComplete)
    {
        $('.progress-bar').width( percentageComplete + '%');
        $('.progress-bar').html( percentageComplete + '%');
    },
    success:function(xhr){
     $('#outerwrpr').hide();
      alert("here...");
     //window.location.href="<?php echo SURL.'Promotions/index/'.$playlistid;?>"
    },
    resetForm: true
   });
 });
});


</script>


<script>
<?php if(empty($record)){?>
$(document).on('click','.chkimg',function(){
    var id = $(this).val();
    window.location.href="<?php echo SURL.'Promotions/Add/';?>"+id+"?id=<?php echo $this->uri->segment('3'); ?>";
});
<?php } ?>
</script>		

<?php
require_once(APPPATH."views/includes/footer.php"); 

 ?>



		
			
			
