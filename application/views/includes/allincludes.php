
<?php 
    if(!empty($record)){
        foreach($record as $key=>$value){
            if($value['pro_type']=="1"){
                require_once(APPPATH."views/includes/firstpromotion.php");
            }else if($value['pro_type']=="2"){ 
                require_once(APPPATH."views/includes/secondpromotion.php");
            }else if($value['pro_type']=="3"){
                require_once(APPPATH."views/includes/thrdpromotion.php");
            }
        }
    }else{
        echo "<h5 class='text-center' style='margin-top:12px;'>No Record Found.</h5>";
    }
?>

