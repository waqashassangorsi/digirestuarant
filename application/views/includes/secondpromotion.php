<div class="fulwrpr scnditem wrpritem" data-id1="<?php echo $value['duration'];?>" data-lastid="<?php echo $value['id'];?>" style="background-image: url('<?php echo SURL."assets/images/layout2.jpg";?>');background-size: 100% 100%;">
    <div class="carousel-caption1" style="left:0;right:0;padding-top:30px;">
        
        <div>
            <h1 class="text-center" style="color:green;margin-top:0;">Zupy</h1>
            <h5 class="text-center" style="color:black;"><span><?php echo $value['first_line'];?></span> <b style="font-weight:bold;"><span><?php echo $value['first_line_version'];?></b></h5>

            <h5 class="text-center" style="color:grey;"><span><?php echo $value['second_line'];?></span> <b style="font-weight:bold;"><span><?php echo $value['secondlineversion'];?></b></h5>
        </div>

        <div style="margin-top:50px;">
            <h1 class="text-center" style="color:green;margin-top:37px">Dodatki</h1>
            <h5 class="text-center" style="color:grey;"><span><?php echo $value['dodakti_item'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dodakti_item_price'];?></b></h5>
            <h5 class="text-center" style="color:grey;"><span><?php echo $value['dodakti_item_scnd'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dodakti_item_scnd_price'];?></b></h5>
            <h5 class="text-center" style="color:grey;"><span><?php echo $value['dodakti_item_thrd'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dodakti_item_thrd_price'];?></b></h5>
            <h5 class="text-center" style="color:grey;"><span><?php echo $value['dodakti_item_forth'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dodakti_item_forth_price'];?></b></h5>
            <h5 class="text-center" style="color:grey;"><span><?php echo $value['dodakti_item_fifth'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dodakti_item_fifth_price'];?></b></h5>
            <h5 class="text-center" style="color:grey;"><span><?php echo $value['dodakti_item_sixth'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dodakti_item_sixth_price'];?></b></h5>
            <h5 class="text-center" style="color:grey;"><span><?php echo $value['dodakti_item_sevnth'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dodakti_item_sevnth_price'];?></b></h5>
            <h5 class="text-center" style="color:grey;"><span><?php echo $value['dodakti_item_eight'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dodakti_item_eight_price'];?></b></h5>
        </div>
    </div>
</div>


<script>
    function function11(){
      
      var lastid = <?php echo $value['id'];?>;
      var playlistid = <?php echo $value['playlistid'];?>;
      clearInterval(myVar);
      
      $.ajax({
        url: "<?php echo SURL.'Screen/getdata'?>",
        cache: false,
        type: "POST",
        data: {lastid : lastid,playlistid : playlistid},
        success: function(html){
           
            $("#header").html(html);
          
        }
      });

    }


var myVar = setInterval(function11,<?php echo $value['duration']*1000;?>);
</script>
