<?php 

session_start(); 
ob_start();

include_once 'dbconnect.php';

$error = false;

if (isset($_POST['signup'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mobile = mysqli_real_escape_string($con, $_POST['contact_number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $captcha = mysqli_real_escape_string($con, $_POST['captcha']);
    $hash = md5(rand(0,1000));

    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if($captcha != $_SESSION['digit']) {
        $error = true;
        $captcha_error = "Sorry, the CAPTCHA code entered was incorrect!";
    }

        $check=mysqli_query($con,"select * from users where email='$email'");
        $checkrows=mysqli_num_rows($check);

                    if($checkrows>0) {
                        $errormsg = "Already registered, <a href='login.php'>click here to Login</a>";
                    } else {  


                        if (!$error) {
                            if(mysqli_query($con, "INSERT INTO users(name,mobile,email,password,hash) VALUES('" . $name . "', '" . $mobile . "','" . $email . "', '" . md5($password) . "','" . $hash . "')")) {
                               
                              
                                    $to      = $email; // Send To
                                    $subject = 'Signup | Verification'; // subject 
                                    $headers = 'From: info@letsreverseit.com' . "\r\n"; // From
                                    $message = '
                                    Thanks for signing up!
                                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

                                    Please click this link to activate your account:
                                    https://www.letsreverseit.com/verify?email='.$email.'&hash='.$hash.'
                                    
                                    ------------------------
                                    Username: '.$email.'
                                    Password: '.$password.'
                                    ------------------------
                                    
                                    '; // Our message above including the link
                                                        


                                    mail($to, $subject, $message, $headers); // Send our email
          
                                    
            $sql = "SELECT  * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "' " ;
        	$result = mysqli_query($con, $sql);
        
        	if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_assoc($result)) {
        		// output data of each row
        				$_SESSION['usr_id'] = $row['id'];
        				$_SESSION['usr_name'] = $row['name'];
        				header("Location: user");
        	}


                           // $actmsg = "Registration completed, <a href='login'>click here to Login</a>";
                                
                            } else {
                                $errormsg = "Error in processing the request, please try again.";
                            }
                        }

                    }
}





?>


<!DOCTYPE html>
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




<?php
if(isset($_SESSION['usr_id']))  
{
    header("Location: user");
    
} 
else {?> 

        
       

    <div class="container w3-display-middle" >
            
        <div ><br>
            <div class="text-center" >
                    <a href="index">
                        <b style="font-size:20px;color: #ffff;">Let's </b> <b style="font-size:20px; color: #4CAF50;">Reverse</b> <b style="font-size:20px;color: #ffff;">It</b>
                    </a>
                </div >
           
            <div class="row">  
                <div class="col-12">
                

                    <form role="form"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="signupform">
                                       
                            <br> 
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control"
                                />
                            </div>
                                <p class="text-danger">
                                    <?php if (isset($name_error)) echo $name_error ;  ?>
                                </p>   
                            

                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email Address" required value="<?php if($error) echo $email; ?>" class="form-control"/>
                            </div>
                            <p class="text-danger">
                                    <?php if (isset($email_error)) echo $email_error; ?>
                            </p>

                            <div class="form-group">
                                <input type="text" name="contact_number" pattern="[7-9]{1}[0-9]{9}"  placeholder="Enter 10 Digit Phone Number" required class="form-control"
                                />
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" required class="form-control" />
                            </div>
                            <p class="text-danger">
                                    <?php if (isset($password_error)) echo $password_error; ?>
                            </p>

                            <div class="form-group">
                                <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                            </div>
                            <p class="text-danger">
                                <?php if (isset($cpassword_error)) echo $cpassword_error; ?>
                            </p>

                       
                            <div class="form-group">
                           
                            
                            <div class="row" style="padding-left:0px;padding-right:0px;">
                                <div class="col-lg-6 col-lg-6 col-sm-8 col-xs-8" >
                                    <input type="text"   maxlength="5" name="captcha" value="" placeholder="Enter Code Here..." required class="form-control" />
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4" style="padding-top:2px;font-size:28px;">
                                <img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA">
                                </div>

                                </div>
                            </div>
                            <p class="text-danger">
                                <?php if (isset($captcha_error)) echo $captcha_error; ?>
                            </p>

                            <p class="text-danger" id="alreadyregistered">
                                <?php if (isset($errormsg)) { echo $errormsg; } ?>
                            </p>
                            
                             <p class="text-white">
                                <?php if (isset($actmsg)) { echo $actmsg; } ?>
                            </p>
                           

                

                            <div class="form-group">
                                <input type="submit" name="signup" value="Sign Up" class="btn btn-success" />
                            </div>
<b>
                             <p class="text-white" id="note">
                                <?php echo "By Signup, you agree our <a href='privacypolicy' style='text-decoration: none;'> Privacy Policy </a>And<a href='termsandcondition' style='text-decoration: none;'> Terms of Use.</a>"  ?>
                            </p>
</b>

                    </form>

                                
                               
                </div>
            </div>

                           

        </div>
    </div>

                   

<script type="text/javascript" src="js/captcha.js"></script>             


                          
<?php  } ?>
     
    </body>

    </html>



