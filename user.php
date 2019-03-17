<?php session_start(); ob_start();?>
<?php

include_once 'dbconnect.php';

$error = false;




if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
 
    

    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $shopname = mysqli_real_escape_string($con, $_POST['shopname']);
    //$shopphone = mysqli_real_escape_string($con, $_POST['shopphone']);
    //$shopemail = mysqli_real_escape_string($con, $_POST['shopemail']);
    $addline1 = mysqli_real_escape_string($con, $_POST['addline1']);
    $addline2 = mysqli_real_escape_string($con, $_POST['addline2']);
    
   


    
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please enter valid email id";
    }
   
    
    if (!$error) {
        if(mysqli_query($con, "UPDATE users SET name='$name' ,mobile='$mobile',email='$email',pincode='$pincode',city='$city',state='$state',country='$country',shopname='$shopname',addline1='$addline1',addline2='$addline2' WHERE id='{$_SESSION['usr_id']}'") ) {
            header("Location: index");
        } else {
            $errormsg = "Error in processing the request, please try again.";
        }
    }
}


// Get User Data From Table
$result=mysqli_query($con,"select * from users WHERE id = '{$_SESSION['usr_id']}'" );
$row=mysqli_fetch_array($result);




?>


<html lang="en">
<head>
   
    <title>USER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/user.css">
    
        



    </head>

    <body>


  
<?php if(isset($_SESSION['usr_id']))  {?>


       
  <br> 

        <div class="container" >

       
        
                    <!-- Registration Form-->
                    <form role="form"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                                      
                   
                            

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="<?php echo $row['name'];?>" required value="<?php if($error) echo $name; ?>" class="form-control"/>
                                    <span class="text-danger">
                                        <?php if (isset($name_error)) echo $name_error; ?>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input   type="text" pattern="[7-9]{1}[0-9]{9}" name="mobile"  value="<?php echo $row['mobile'];?>" required value="<?php if($error) echo $name; ?>" class="form-control"/>
                                    <span class="text-danger">
                                        <?php if (isset($name_error)) echo $name_error; ?>
                                    </span>
                                </div>

                                <div class="form-group">
                                <label>Email</label>
                                <input  type="text" name="email" value="<?php echo $row['email'];?>" required value="<?php if($error) echo $email; ?>" class="form-control"/>
                                    <span class="text-danger">
                                        <?php if (isset($email_error)) echo $email_error; ?>
                                    </span>
                                </div>


                                <hr>

                
                                        
              

<span id="text" style="display:none"> 
                                
                                              
                                <div class="form-group">
                                    <label >Shop Name:</label>
                                    <input type="text" class="form-control" name="shopname"  value="<?php echo $row['shopname'];?>" />
                                </div>         
                       

                                <div class="form-group">
                                    <label >Shop No./Street Name:</label>
                                    <input type="text"  class="form-control" name="addline1" value="<?php echo $row['addline1'];?>"/>
                                </div>


                                <div class="form-group">
                                    <label >Landmark:</label>
                                    <input type="text"   class="form-control" name="addline2" value="<?php echo $row['addline2'];?>"/>
                                </div>

                                <div class="form-group">
                                    <label >Pincode/Zipcode:</label>
                                    <input type="text"   class="form-control" name="pincode" value="<?php echo $row['pincode'];?>"  />
                                </div>
</span>                          
                                <div class="form-group">
                                    <label >City:</label>
                                    <input type="text"   class="form-control" name="city" required value="<?php echo $row['city'];?>"  />
                                </div>
                            
                                <div class="form-group">
                                <label >State:</label>
                                <input type="text"   class="form-control"  name="state" required value="<?php echo $row['state'];?>"  />
                                </div>

                                <div class="form-group">
                                <label >Country:</label>
                                <input type="text"  class="form-control" name="country" required value="<?php echo $row['country'];?>"  />
                                </div> 

                                <span id="sellercheckbox">Check if you are a Seller:</span> <input type="checkbox" id="myCheck"  onclick="myFunction()">       
   
                                <br><br>

                                <div class="form-group" >
                                    <input type="submit" name="update" value="Update" class="btn btn-success" />
                                </div>



                    </form>

                            
                            <span class="text-danger">
                                <?php if (isset($errormsg)) { echo $errormsg; } ?>
                            </span>


                            <br>       
                </div> 
               
                
               
    
          
<script>
function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }

    var text = document.getElementById("text1");
    if (checkBox.checked == true){
        text.style.display = "none";
    } else {
       text.style.display = "block";
    }

}
</script>
 
     
<?php } else { header("Location: index"); } ?>
    </body>

    </html>