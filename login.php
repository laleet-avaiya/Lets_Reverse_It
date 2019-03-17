<?php 

session_start();
ob_start();

include_once 'dbconnect.php';

$error = false;




if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
	
	$sql = "SELECT  * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "' " ;
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		if($row = mysqli_fetch_assoc($result)) {
				$_SESSION['usr_id'] = $row['id'];
				$_SESSION['usr_name'] = $row['name'];
				header("Location: index");
		}
	} else {
		$errormsg = "Incorrect email or password !!!";
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
				header("Location:user"); 
        } 
                
        else { ?>

       
     
        
            <div class="container w3-display-middle ">
            
                <div > 
                
                <div class="text-center" >
                    <a href="index">
                        <b style="font-size:20px;color: #ffff;">Let's </b> <b style="font-size:20px; color: #4CAF50;">Reverse</b> <b style="font-size:20px;color: #ffff;">It</b>
                    </a>
                </div >
                 
                    <div class="row">

                        <div class="col-12">
                            <!-- Login Form-->
                            <br> 

                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">

                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email address" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"   name="login" value="Login" class="btn btn-success" />
                                    </div>
                              
                                </form>
                                
                                <span class="text-white">
                                 <a href="forgotpassword">Forgot password?</a>   
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