<?php 
include_once 'dbconnect.php';


    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
    
  //  echo "$hash";
  $error = false;
  
  if(isset($_POST['submit'])) {
        
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        
         if(strlen($password) < 6) {
            $error = true;
            $password_error = "Password must be minimum of 6 characters";
        }
        if($password != $cpassword) {
            $error = true;
            $cpassword_error = "Password and Confirm Password doesn't match";
        }
        if (!$error) {
        
           if(mysqli_query($con, "UPDATE users SET password= md5($password) WHERE email='$email' AND hash='$hash'")) {
                $sucessmsg = "Password Reset Successfully. <a href='login'>Click here to Login</a>";
            } else {
                $errormsg = "Incorrect Email !!!";
            }
            
        }
        
  }
        
       
                 



?>

<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/registration.css">
</head>

<body>




    
   

<div class="container w3-display-middle" >
        
    <div >
       
        <div class="row">  
            <div class="col-12">
            

                <form role="form"  method="post" name="resetpassword">
                                   
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" required class="form-control" />
                        </div>

                        <p class="text-danger">
                                <?php if (isset($password_error)) echo $password_error; ?>
                        </p>

                        <div class="form-group">
                            <input type="password" name="cpassword" placeholder="Confirm password" required class="form-control" />
                        </div>
                        
                        <p class="text-danger">
                            <?php if (isset($cpassword_error)) echo $cpassword_error; ?>
                        </p>

                   
                      
                    
                        <div class="form-group">
                            <input type="submit" name="submit" value="submit" class="btn btn-success" />
                        </div>


                </form>
                
                <p class="text-white">
                                <?php if (isset($sucessmsg)) { echo $sucessmsg; } ?>
                            </p>
                           

                             <p class="text-danger">
                                <?php if (isset($errormsg)) { echo $errormsg; } ?>
                            </p>
                           
            </div>
        </div>

                       

    </div>
</div>

               
    
 
</body>

</html>