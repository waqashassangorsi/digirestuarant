<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Promotion Date Between:</legend>
    <div class="form-group">
        <label class="col-xs-2 col-sm-1">From Date</label>
        <div class="col-sm-3">
            <input type="text" autocomplete="off" required class="form-control datepicker" data-format="yyyy-mm-dd" name="start_Date" value="<?php if(!empty($record['start_Date'])){ echo $record['start_Date']; }else{echo date("Y-m-d");}?>"> 
        </div>

        <label class="col-xs-2 col-sm-3 text-right">To Date</label>
        <div class="col-sm-3">
            <input type="text" autocomplete="off" required class="form-control datepicker" data-format="yyyy-mm-dd" name="end_Date" value="<?php if(!empty($record['end_Date'])){ echo $record['end_Date']; }else{echo date("Y-m-d");}?>"> 
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
    <legend  class="scheduler-border">Add Image</legend>
        <input type="file" name="file" class="" id="upload_image" accept="image/png,image/jpg,image/jpeg" />
        <!--<label for="upload_image" class="btn btn-info">Upload Image</label>-->
        <div style="margin-top:10px;">
            <?php if(!empty($record['image'])){?>
                <img src="<?php echo $record['image'];?>" class="img-responsive" style="width:100px;"/>
            <?php } ?>
        </div>
        
        
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Duration For stay(seconds)</legend>
    <div class="col-sm-3">
        <input type="number" autocomplete="off" class="form-control" required name="duration" value="<?php if(!empty($record['duration'])){ echo $record['duration'];}else{ echo 10; }; ?>"> 
    </div>
</fieldset>
