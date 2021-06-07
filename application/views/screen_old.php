<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/front_end/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/front_end/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/front_end/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/front_end/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/front_end/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/front_end/css/main.css">
<!--===============================================================================================-->
</head>
<body>

<style>
   .carousel-caption{position:absolute;top:0;} 
   .carousel-item{
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        
    }
    h5{padding:4px;}
    .zeslaw{color:green;margin: 0 auto;width: 252px;margin-top:-17px;background-image:url("assets/images/Capture.PNG")}
    @font-face {
    font-family: myFirstFont;
    src: url("assets/front_end/fonts/poppins/Cream_Cake.ttf");
  }  
  h1{font-family:myFirstFont;font-size: 60px;}
  h4{font-family:myFirstFont;font-size: 30px;}
  h5{margin-bottom: 12px;}
   
</style>

<header id="header">
      <!-- Slide One - Set the background image for this slide in the line below -->
    <div id="carouselExampleIndicators" class="carousel slide" data-pause="true" data-ride="carousel">
        
        <div class="carousel-inner" role="listbox">
          
        <?php 
            if(empty($first) && empty($scnd) && empty($thrd)){
                 echo "<h3 class='text-center' style='padding-top:126px;'>No Promotion Available Right Now.</h3>";
            }else{
                include(APPPATH."views/includes/allincludes.php");
            }
              
        ?>
        
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
        </a>
    
    </div> 

</header>

<script>




function function1(){
    
    
      id=1;
      $.ajax({
        url: "<?php echo SURL.'Screen/check'?>",
        cache: false,
        type: "POST",
        data: {id : id},
        success: function(html){
            
            $(".carousel-inner").html(html);
          
          
        }
      });

}

//setInterval(function12, 400000);


    
</script>

<!--===============================================================================================-->	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<!--===============================================================================================-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</body>
</html>




<style>
    .carousel-item {
        height: 100vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }
</style>