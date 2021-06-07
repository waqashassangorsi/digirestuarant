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
    
    <!--<div class="form-group">-->
    <!--    <label class="col-xs-2 col-sm-1 text-right">Promotion ID:</label>-->
    <!--    <div class="col-sm-3">-->
    <!--        <select class="form-control" name="restuarantid">-->
    <!--            <?php foreach($restuarant as $key=>$value){?>-->
    <!--            <option value="<?php echo $value['id'];?>" <?php if($record['playlistid']==$value['id']){ echo "selected";}?>><?php echo $value['name'];?></option>-->
    <!--            <?php } ?>-->
    <!--        </select>-->
    <!--    </div>-->
        
    <!--</div>-->
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">First Dish:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="firstdish" rows="3" placeholder="Write Dish"><?php echo $record['firstdish'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" name="dish1price" value="<?php echo $record['dish1price'];?>" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
        <div class="col-sm-3">
            <input type="text" name="dish1version" value="<?php echo $record['dish1version'];?>"  class="form-control" id="field-1" placeholder="Enter Product version" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Second Dish:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="seconddish" rows="3" placeholder="Write Dish"> <?php echo $record['seconddish'];?>" </textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" name="dish2price" value="<?php echo $record['dish2price'];?>" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
        <div class="col-sm-3">
            <input type="text" name="dish2version" value="<?php echo $record['dish2version'];?>" class="form-control" id="field-1" placeholder="Enter Product version" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Third Dish:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="thirddish" rows="3" placeholder="Write Dish"><?php echo $record['thirddish'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" name="dish3price" value="<?php echo $record['dish3price'];?>" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
        <div class="col-sm-3">
            <input type="text" name="dish3version" value="<?php echo $record['dish3version'];?>" class="form-control" id="field-1" placeholder="Enter Product version" required>
        </div>
    </div>
</fieldset>

<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Zeslaw Dnia:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="leftproduct" rows="3" placeholder="Write Content"><?php echo $record['leftproduct'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['leftproductprice'];?>" name="leftproductprice" class="form-control" id="field-1" placeholder="Enter Product description" required>
        </div>
        <div class="col-sm-3">
            <input type="text" value="<?php echo $record['leftproductversion'];?>" name="leftproductversion" class="form-control" id="field-1" placeholder="Enter Product version" required>
        </div>
    </div>
</fieldset>
<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Danie Fit:</legend>
    <div class="form-group">
        
        <div class="col-sm-5">
            <textarea class="form-control" name="rightproduct" rows="3" placeholder="Write Content"><?php echo $record['rightproduct'];?></textarea>
        </div>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $record['rightproductprice'];?>" name="rightproductprice" class="form-control" id="field-1" placeholder="Enter Product Price" required>
        </div>
        <div class="col-sm-3">
            <input type="text" value="<?php echo $record['rightproductversion'];?>" name="rightproductversion" class="form-control" id="field-1" placeholder="Enter Product version" required>
        </div>
    </div>
</fieldset>
<fieldset class="scheduler-border">
    <legend  class="scheduler-border">Duration For stay(seconds)</legend>
    <div class="col-sm-3">
        <input type="number" autocomplete="off" class="form-control" required name="duration" value="<?php if(!empty($record['duration'])){ echo $record['duration'];}else{ echo 10; }; ?>"> 
    </div>
</fieldset>