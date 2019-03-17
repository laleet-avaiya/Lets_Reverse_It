<?php session_start(); ob_start();?>
<?php
include_once 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116608709-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-116608709-1');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About us</title>
</head>

<body style="background-color:#ffffff;">



<div style="width:100%;height:auto;background-color:#ffff;">
<?php include 'navbar.php' ?>
</div>



<div class="container" style="padding-top:8%;font-family:monospace;list-style:none;">

        
        <h2 style="font-family:monospace;text-align:center;font-weight:900;" > About us </h2><br>
       

        <h4 style="font-family:monospace;text-align:justify;line-height: 1.5;font-size:20px;"> <b style="color: #4CAF50;">LetsReverseIt.com</b> is a platform where buyer meet best sellers around to buy anything like laptop, car,  mobile, furniture, clothing and much more...</h4>
       
<br>

       <div style="font-family:monospace;text-align:justify;line-height: 1.5;font-size:18px;">
       
            <p > <b>Advantages: </b></p> 
            <li><b>|</b> Save time and fuel</li>
            <li><b>|</b> Chances of buying duplicate product is less</li>
            <li><b>|</b> Find best price for any product by comparring proposals</li>
        
            
            <li><b>|</b> Increase your sell just by submitting proposal</li>
            <li><b>|</b> Sell your products with <b> 0% </b> commission</li>
            <li><b>|</b> No need to pay commission to other</li>
        
        </div>
        
 

</div>
<br><br><br><br><br><br><br><br><br><br>
<?php include 'footer.php' ?>


</body>
</html>