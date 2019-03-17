<?php 
include_once 'dbconnect.php';


    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
    
    //echo "$hash";
                     
    $result = mysqli_query($con,"SELECT  * FROM users WHERE email='$email'" );
    $row = mysqli_fetch_array($result);
    
    if($row['active'] == 0){
            mysqli_query($con, "UPDATE users SET active='1' WHERE email='$email' && hash='$hash'"); 
            $activemsg =  "Your account has been activated, <a href='login'>click here to Login</a>";
           
    }else{
            // No match -> invalid url or account has already been activated.
            $errormsg = "The url is either invalid or account is already activated.";
        }
        
                 


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify</title>
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
            
            

                   
                            <br> 

                                <span class="text-white">
                                    <?php if (isset($activemsg)) { echo $activemsg; } ?>
                                </span>
                                
                                <span class="text-danger">
                                    <?php if (isset($errormsg)) { echo $errormsg; } ?>
                                </span>

                        </div>
                       
                  
           
        <?php } ?>

      

    </body>

    </html>
    
</body>
</html>