<div class="frstitem fulwrpr wrpritem" data-id1="<?php echo $value['duration'];?>" data-lastid="<?php echo $value['id'];?>" style="background-image: url('<?php echo SURL."assets/images/layout.jpeg";?>');background-size: 100% 100%;">
    <div>
        <h6 class="text-right" style="padding-right:200px;color:#706a6a;margin-top:0;padding-top: 45px;font-weight: bold;">Piatek 13.03</h6>
        <div>
            <h1 class="text-center" style="color:green;margin-top:0;font-style:oblique;margin-bottom:30px;">Dania Gtowne:</h1>
            <h5 class="text-center" style="color:black;"><span><?php echo $value['firstdish'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dish1price'];?></b> <span>(<span><?php echo $value['dish1version'];?>)</span></h5>
            <h5 class="text-center" style="color:black;"><span><?php echo $value['seconddish'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dish2price'];?></b> <span>(<span><?php echo $value['dish2version'];?>)</span></h5>
            <h5 class="text-center" style="color:black;"><span><?php echo $value['thirddish'];?></span> <b style="font-weight:bold;"><span><?php echo $value['dish3price'];?></b> <span>(<span><?php echo $value['dish3version'];?>)</span></h5>
        </div>

        <div style="padding:30px;width: 80%;margin: 0 auto;margin-top: 120px;">
            <div style="border:1px solid #9ccb3b;float:left;width:49%;">
                <h4 class="text-center zeslaw" style="margin-top:-39px;height:42px">Zestaw dnia</h4>
                <h5 class="text-center" style="color:black;padding:15px;"><span><?php echo $value['leftproduct'];?></span> <b style="font-weight:bold;"><span><?php echo $value['leftproductprice'];?></b> <span>(<span><?php echo $value['leftproductversion'];?>)</span></h5>
            </div>

            <div style="border:1px solid #9ccb3b;width:49%;float:right;">
                <h4 class="text-center zeslaw" style="margin-top:-39px;height:42px">Danie fit</h4>
                <h5 class="text-center" style="color:black;padding:15px;"><span><?php echo $value['leftproduct'];?></span> <b style="font-weight:bold;"><span><?php echo $value['leftproductprice'];?></b> <span>(<span><?php echo $value['leftproductversion'];?>)</span></h5>
            </div>
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
