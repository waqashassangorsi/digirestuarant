<?php
        require_once('getid3/getid3.php');
        $getID3 = new getID3();
        $filename="1.mp4";
        $fileinfo = $getID3->analyze($filename);

        $width=$fileinfo['video']['resolution_x'];
        $height=$fileinfo['video']['resolution_y'];

        //echo $fileinfo['video']['resolution_x']. 'x'. $fileinfo['video']['resolution_y'];

        echo $fileinfo['playtime_seconds'];
        echo '<pre>';print_r($fileinfo);echo '</pre>';
?>