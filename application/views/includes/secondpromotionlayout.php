<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Promotion Date Between:</legend>
    <div class="form-group">
        <label class="col-xs-2 col-sm-1">From Date</label>
        <div class="col-sm-3">
            <input type="text" autocomplete="off" class="form-control datepicker" data-format="yyyy-mm-dd" name="start_Date" value="<?php if(!empty($record['start_Date'])){ echo $record['start_Date']; }else{echo date("Y-m-d");}?>"> 
        </div>

        <label class="col-xs-2 col-sm-3 text-right">To Date</label>
        <div class="col-sm-3">
            <input type="text" autocomplete="off" class="form-control datepicker" data-format="yyyy-mm-dd" name="end_Date" value="<?php if(!empty($record['end_Date'])){ echo $record['end_Date']; }else{echo date("Y-m-d");}?>"> 
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
    
     <?php if(isset($_GET['id'])){?>
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="restuarantid"/>
    <?php } ?>
    
    <?php if(!empty($record['playlistid'])){?>
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="restuarantid"/>
    <?php } ?>
    
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="first_line" rows="3" placeholder="Write Dish"><?php echo $record['first_line'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" name="first_line_version" value="<?php echo $record['first_line_version'];?>" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="second_line" rows="3" placeholder="Write Dish"> <?php echo $record['second_line'];?>" </textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" name="secondlineversion" value="<?php echo $record['secondlineversion'];?>" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item" rows="3" placeholder="Write Dish"><?php echo $record['dodakti_item'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" name="dodakti_item_price" value="<?php echo $record['dodakti_item_price'];?>" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item_scnd" rows="3" placeholder="Write Content"><?php echo $record['dodakti_item_scnd'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['dodakti_item_scnd_price'];?>" name="dodakti_item_scnd_price" class="form-control" id="field-1" placeholder="Enter Product description" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item_thrd" rows="3" placeholder="Write Content"><?php echo $record['dodakti_item_thrd'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['dodakti_item_thrd_price'];?>" name="dodakti_item_thrd_price" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item_forth" rows="3" placeholder="Write Content"><?php echo $record['dodakti_item_forth'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['dodakti_item_forth_price'];?>" name="dodakti_item_forth_price" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item_fifth" rows="3" placeholder="Write Content"><?php echo $record['dodakti_item_fifth'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['dodakti_item_fifth_price'];?>" name="dodakti_item_fifth_price" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item_sixth" rows="3" placeholder="Write Content"><?php echo $record['dodakti_item_sixth'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['dodakti_item_sixth_price'];?>" name="dodakti_item_sixth_price" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item_sevnth" rows="3" placeholder="Write Content"><?php echo $record['dodakti_item_sevnth'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['dodakti_item_sevnth_price'];?>" name="dodakti_item_sevnth_price" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item_eight" rows="3" placeholder="Write Content"><?php echo $record['dodakti_item_eight'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['dodakti_item_eight_price'];?>" name="dodakti_item_eight_price" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Content To Write Here:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="dodakti_item_nine" rows="3" placeholder="Write Content"><?php echo $record['dodakti_item_nine'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['dodakti_item_nine_price'];?>" name="dodakti_item_nine_price" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Duration For stay(seconds)</legend>
    <div class="col-sm-3">
        <input type="number" autocomplete="off" class="form-control" required name="duration" value="<?php if(!empty($record['duration'])){ echo $record['duration'];}else{ echo 10; }; ?>"> 
    </div>
</fieldset>