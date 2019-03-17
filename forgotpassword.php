<?php 

include_once 'dbconnect.php';

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);

	$sql = "SELECT  * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
   

	if (mysqli_num_rows($result) > 0) {
	
		if($row = mysqli_fetch_assoc($result)) {

            $password = $row['password'];
            $hash = $row['hash'];
            
            $to      = $email; // Send To
            $subject = 'Forgot password'; // subject 
            $headers = 'From: info@letsreverseit.com' . "\r\n"; // From
            $message = '
           
            
            Please click this link to reset your password:
            https://www.letsreverseit.com/resetpassword?email='.$email.'&hash='.$hash.'
            
           
            
            '; // Our message above including the link
                            
            if(mail($to, $subject, $message, $headers) ){
               $sentmsg = "Password reset link sent, check your mail.";
            }else{
              	$errormsg = "Error while processing request, please try again.";
            }
           // Send our email

           

		}
	} else {
		$errormsg = "Incorrect Email !!!";
	}

	mysqli_close($con);
	
}


?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Login</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/login.css">

    </head>

<body>

    
        
         

        <?php 
                if (isset($_SESSION['usr_id'])) { 
				header("Location:index"); 
        } 
                
        else { ?>

       
     
        
            <div class="container w3-display-middle ">
            
                <div >

                    <div class="row">

                        <div class="col-12">
                            <!-- Login Form-->
                            <br> 

                                <form role="form" method="post" name="loginform">

                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email Address" required class="form-control" />
                                    </div>

                                

                                    <div class="form-group">
                                        <input type="submit"   name="submit" value="submit" class="btn btn-success" />
                                    </div>
                              
                                </form>
                                
                                <span class="text-white">
                                    <?php if (isset($sentmsg)) { echo $sentmsg; } ?>
                                </span>
                                
                                <span class="text-danger">
                                    <?php if (isset($errormsg)) { echo $errormsg; } ?>
                                </span>

                        </div>
                       
                    </div>
            
                </div>

            </div>
           
        <?php } ?>

      

    </body>

    </html>