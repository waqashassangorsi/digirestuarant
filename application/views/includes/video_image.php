<?php foreach($thrd as $key=>$value){?>
    <video width="100%" height="100%" autoplay loop>
      <source src="<?php echo SURL.$value['image'];?>" type="video/mp4">
      <source src="<?php echo SURL.$value['image'];?>" type="video/ogg">
        Your browser does not support the video tag.
    </video>
<?php } ?>   