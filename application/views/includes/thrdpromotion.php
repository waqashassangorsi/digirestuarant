<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="carousel-item item thrditem wrpritem" data-id1="<?php echo $value['duration'];?>" data-lastid="<?php echo $value['id'];?>" >
    <!--<div class="carousel-caption" style="left:0;right:0;padding:0;">-->
        <?php if($value['type']=="Image"){?>
        <div style="width:100%;height:100%;overflow:hidden;">
            <img src="<?php echo SURL.$value['image'];?>" style="width:100%;"/>
        </div>
        <?php }else{ ?>
        <div style="width:100%;height:100%;">
           <video id="myVideo" width="100%" height="100%" autoPlay>
              <source src="<?php echo SURL.$value['image'];?>" type="video/mp4">
              <source src="<?php echo SURL.$value['image'];?>" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>
        <?php } ?>

    <!--</div>-->
</div>

<style>
    body {
  overflow: hidden; 
  background:black;
}
</style>

<script>
var lastid = <?php echo $value['id'];?>;
var playlistid = <?php echo $value['playlistid'];?>;
$(document).ready(function(){
	<?php if($value['type']=="Video"){ ?>
	try{
        var elem = document.getElementById("myVideo")
        elem.addEventListener('ended', function() {function11();}, true);
    }catch(err) {
	console.log(err.message);
    }
    <?php } ?>
});
    function function11(){
try{
      lastid = <?php echo $value['id'];?>;
      playlistid = <?php echo $value['playlistid'];?>;
      <?php if($value['type']=="Image"){?>
          clearInterval(myVar);
      <?php } ?>
      const url="<?php echo SURL.'Screen/getdata'?>";
      jQuery.post(url,{ lastid : lastid, playlistid : playlistid },function(data,status){
      var headerHTML=$("header");
      headerHTML.html(data);
      //$("#header").load(url,{ lastid : lastid, playlistid : playlistid });
      });
}catch(err){alert(err.message);};
    }
<?php if($value['type']=="Image"){?>
var myVar = setInterval(function11,<?php echo $value['duration']*1000;?>);
<?php } ?>
</script>
