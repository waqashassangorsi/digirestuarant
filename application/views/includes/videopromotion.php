<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Promotion Date Between:</legend>
    <div class="form-group">
        <label class="col-xs-2 col-sm-1">From Date</label>
        <div class="col-sm-3">
            <input type="text" required  autocomplete="off" class="form-control datepicker" data-format="yyyy-mm-dd" name="start_Date" value="<?php if(!empty($record['start_Date'])){ echo $record['start_Date']; }else{echo date("Y-m-d");}?>"> 
        </div>

        <label class="col-xs-2 col-sm-3 text-right">To Date</label>
        <div class="col-sm-3">
            <input type="text" required  autocomplete="off" class="form-control datepicker" data-format="yyyy-mm-dd" name="end_Date" value="<?php if(!empty($record['end_Date'])){ echo $record['end_Date']; }else{echo date("Y-m-d");}?>"> 
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-2 col-sm-1">From Time</label>
        <div class="col-sm-3">
            <input type="time" autocomplete="off" value="<?php if(!empty($record['start_time'])){ echo $record['start_time']; }else{ echo "00:00:00";};?>" class="form-control" name="from_time" > 
        </div>

        <label class="col-xs-2 col-sm-3 text-right">To Time</label>
        <div class="col-sm-3"> 
            <input type="time" autocomplete="off" value="<?php if(!empty($record['end_time'])){ echo $record['end_time']; }else{ echo "00:00:00";};?>" class="form-control" name="to_time" > 
        </div>
        
    </div>
    
    <?php 
        if(isset($_GET['id'])){
            $playlistid = $_GET['id'];
    ?>
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="restuarantid"/>
    <?php } ?>
    
    <?php 
        if(!empty($record['playlistid'])){
            $playlistid = $record['playlistid'];
    ?>
    <input type="hidden" value="<?php echo $record['playlistid']; ?>" name="restuarantid"/>
    <?php } ?>
    
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Add Video</legend>
        <input type="file"  name="video" class="" id="upload_image" accept="video/mp4,video/x-m4v,video/*" />
        <!--<label for="upload_image" class="btn btn-info">Upload Video</label>-->
         <div style="margin-top:10px;">
            <?php if(!empty($record['image'])){?>
                <video width="320" height="240" controls>
                  <source src="<?php echo $record['image'];?>" type="video/mp4">
                  <source src="<?php echo $record['image'];?>" type="video/ogg">
                Your browser does not support the video tag.
                </video>
            <?php } ?>
        </div>
        
</fieldset>

