<?php session_start(); ob_start();?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LetsReverseIt</title>
    
    <link rel="stylesheet" href="css/index.css"> 
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116608709-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-116608709-1');
    </script>
 


</head>

<body style="background-color:#ffffff;">



<div style="width:100%;height:auto;background-color:#ffff;">
<?php include 'navbar.php' ?>
</div>
          
           

<br>





<div class="container">

  <div class="row" id="pagefpanel">
    <div class="col-sm-12">
      <h1 id="maintag">
        Platform for buyers and sellers
      </h1>

      <p style="text-align: center;">
        Buy and sell your products at <b> 0% </b> commission.
      </p> 


    </div>
  </div>
  
   <?php if (isset($_SESSION['usr_id'])) { ?>
            <div class="form-group text-center" style="font-family:monospace;">
                
                <a href="AddQuotationRequest">
                    <button type="button" class="btn btn-success" style="width:180px;margin-bottom: 5px;font-weight:900;">Add Quotation Request</button>
                </a>
                 <a href="categories">
                    <button type="button" class="btn btn-success" style="width:180px;margin-bottom: 5px;font-weight:900;">Submit Proposal</button>
                </a>
                
            </div>

            <?php    }  else { ?>

                   <div class="form-group text-center">
                 <a href="login"><button type="button" class="btn btn-success" style="margin-right:10px;width:120px;font-weight:900;">Login</button></a>
                  <a href="registration"><button type="button" class="btn btn-success" style="margin-right:10px;width:120px;font-weight:900;">Sign Up</button></a>
                    </div>

                    <?php } ?>
  


<!-- PHOW Its Work -->
    

<?php include 'howitswork.php' ?>


</div>



<!-- Container (Contact Section) -->

<?php include 'contactus.php' ?>

<br>
   



<!-- Container (Footer Section) -->

<?php include 'footer.php' ?>




</body>

</html>




