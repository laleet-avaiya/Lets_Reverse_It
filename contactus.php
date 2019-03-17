
<?php
include_once 'dbconnect.php';

$result = mysqli_query($con,"SELECT count(*) AS count FROM qrdata ORDER BY ID" );
$row = mysqli_fetch_array($result);
$count = $row['count'];

if (isset($_POST['adsrequest'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $comments = mysqli_real_escape_string($con, $_POST['comments']);
    
    
            $to      = "info@letsreverseit.com"; // Send To
            $subject = $name; // subject 
            $headers = "From: '$email'" . "\r\n"; // From
            $message = '
            
           ------------------------
            Name: '.$name.'
            
            Comments: '.$comments.'
            
            Email: '.$email.'
            Contact: '.$contact.'
            City: '.$city.'
            ------------------------
            
            '; 
                            
            if(mail($to, $subject, $message, $headers) ){
                
                
            mysqli_query($con, "INSERT INTO ads(name,email,contact,city,comments) VALUES('" . $name . "', '" . $email . "','" . $contact . "', '" . $city . "', '" . $comments . "')");
               $sentmsg = "Send.";
            }else{
              	$errormsg = "Error while processing, please try again!";
            }
            
   
}

?>


<html lang="en">
<head>
     <link rel="stylesheet" href="css/contactus.css"> 
</head>

<body>


    
<div id="contact" class="container bg-grey"> 
  <br><br><br>

<div class="panel panel-default"  >
          <div class="panel-body"  >
              
              
 <center id="homepagetag" class="text-left" >CONTACT US</center>
 
  <br>

  <div class="row">

    <div class="col-sm-5">
      <p> <b> Write your questions and suggestion to us, </b>we'll get back to you within 24 hours.</p>
      <br>
      
    
      <p><span class="glyphicon glyphicon-envelope"></span> info@letsreverseit.com</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Surat, India</p>

      <br>
 <!--   <h2 class="text-left" >CONTACT US</h2>
 <p><center> <span style="font-size:24px;font-family:monospace;color:grey;font-weight:900;">Total requests : <?php echo "$count"; ?> </span></center></p>
     <p><span class="glyphicon glyphicon-phone"></span> </p> -->
    </div>

   <div class="col-sm-7 slideanim">
       <p><center> <span style="font-size:24px;font-family:monospace;color:grey;font-weight:900;">Total requests : <?php echo "$count"; ?> </span></center></p>
  <!--    <p><span class="glyphicon glyphicon-phone"></span> </p> -->
    </div>
 <!--
        <form role="form"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="adsrequest">

            <div class="row">
              <div class="col-sm-6 form-group">
                <input class="form-control" type="text" name="name" placeholder="Enter Your Name" required>
              </div>
              <div class="col-sm-6 form-group">
                <input class="form-control" name="email" placeholder="Email Address" type="email" required>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group">
                <input class="form-control" type="text" name="contact" placeholder="Phone Number"   required>
              </div>
              <div class="col-sm-6 form-group">
                <input class="form-control" type="text" name="city" placeholder="City"  required>
              </div>
            </div>

            <textarea class="form-control" type="text" id="comments" name="comments" placeholder="Write Something About You." rows="5"></textarea>

            <br>
            <div class="row">
              <div class="col-sm-12 form-group">
                <button class="btn btn-success pull-right" name="adsrequest" type="submit">Send</button>
              </div>
            </div>

<?php if (isset($errormsg)){ ?>
            <span class="text-success">
                    <?php echo $errormsg;  ?>
            </span>
<?php } ?>

<?php if (isset($sentmsg)){ ?>
            <span class="text-success">
                    <?php echo $sentmsg;  ?>
            </span>
<?php } ?>

        </form>
 -->
 
    </div>
    
   
  </div>
</div>


  </div>
</div>

</body>

</html>