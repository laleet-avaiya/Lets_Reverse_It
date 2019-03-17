<?php session_start(); ob_start();?>
<?php

include_once 'dbconnect.php';


    // Add QRDATA in Database.

    $error = false;

    $result1 = mysqli_query($con,"SELECT * FROM users WHERE id = '{$_SESSION['usr_id']}' " );
    $row=mysqli_fetch_array($result1);

//check if form is submitted
if (isset($_POST['AddQR']) && $_POST['randcheck']==$_SESSION['rand'] ) {

    $postedid = $_SESSION['usr_id'];
    $categories = mysqli_real_escape_string($con, $_POST['categories']);
    $postedby = $_SESSION['usr_name'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    
    $date = date("Y-m-d H:i:s");
    $city = strtoupper($row['city']) ;
    $state = $row['state'] ;
    $country = $row['country'] ;



    ////////IMAGE UPLOAD///////////


    $image = $_FILES['image']['name'];
    $file_basename = substr($image, 0, strripos($image,'.')); // get file extention
    $file_ext = substr($image, strripos($image,'.')); // get file name

    

    $name1 = rand(999, 99999);  //Tosave name
    $name2 = rand(999, 99999);  //Tosave name

    if($file_basename!= NULL){
    $newfilename=$name1.$name2.$file_ext;     // Rename file
    }
    else{
        $newfilename = " ";
    }
    // image file directory
    $target = "upload/".$newfilename ;


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "File uploaded successfully";
    }else{
        $msg = "Failed to upload file";
    }

    
        if(mysqli_query($con, "INSERT INTO qrdata(postedid,categories,postedby,title,description,image,date,city,state,country) VALUES('" . $postedid . "','" . $categories . "','" . $postedby . "','" . $title . "', '" . $description . "', '" . $newfilename . "' ,'". $date ."','". $city ."','". $state ."','". $country ."')")) {
            $errormsg = "Successfully submitted!";
        } else {
            $errormsg = "Error while processing request, please try again!";
        }
    }



// ------------------------ ADD CATEGORIES --------------------------------- //

if (isset($_POST['Addcategories'])) {
        
        $categories1 = mysqli_real_escape_string($con, strtoupper($_POST['categoriesadd']));


        if (!preg_match("/^[a-zA-Z ]+$/",$categories1)) {
            $error = true;
            $category_error = "Category must contain only alphabets";
        }
        if (!$error) {

            $check=mysqli_query($con,"select * from categories where categories='$categories1'");
            $checkrows=mysqli_num_rows($check);

                        if($checkrows>0) {
                            $errormsg1 = "Already exists, select from the list";
                        } else {  
                    
                            if(mysqli_query($con, "INSERT INTO categories(categories) VALUES('" . $categories1 . "')")) {
                                $errormsg1 = "Sucessfully added, select from the list.";
                            
                            } else {
                                $errormsg1 = "Error while processing request, please try again!";
                            }
                        }
            }
        }

    //----------  Category List ---------------- //
    $result=mysqli_query($con,"select * from categories ORDER BY categories ASC ");

?>




<!DOCTYPE html>
<html lang="en">
<head>

    <title>Add Quotation Request</title>
   
   
    <link rel="stylesheet" href="css/Add_Quotation_Request.css">
</head>
<body style="background-color:#f3f3f3;">

<?php
if(isset($_SESSION['usr_id']))  {?>

    <!-- NAV BAR -->
    <div style="width:100%;height:auto;background-color:#ffff;">
        <?php include 'navbar.php' ?>
    </div>

<div class="container">

<br>

        <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                <h2 id="pagehead"><b>Tell us what you need.</b></h2>
                </div>
                <div class="col-sm-2"></div>
        </div>

        <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                <h4 id="categoryhead"><b>Choose a category for your product</b></h4>
                </div>
                <div class="col-sm-2"></div>
        </div>



    <div class="row">

        <div class="col-sm-2"></div>

        <div class="col-sm-8">




            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="Addform" enctype="multipart/form-data">

            <?php
                $rand=rand();
                $_SESSION['rand']=$rand;
            ?>

            <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

                <div class="row" >
                    <div class="col-sm-12">
                        
                        <select name="categories"   class="form-control" >
                                            <?php while($row=mysqli_fetch_array($result)): ?>
                                                <option value="<?php echo $row['categories'] ;?>"> <?php echo $row['categories'] ;?></option>
                                            <?php endwhile;?>
                        </select> 
                    </div>
                </div>

                <div class="row">
                    <br>
                    <div class="col-sm-8">
                    <b style="color:grey;" id="Categorynotfount">"If category you are looking for does not exists, add new one by click on Add Category."</b>
                    </div>
                    <div class="col-sm-4">
                    <button id="addcate" type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal1">Add Categorie</button> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="msg">
                            <span class="text-success">
                                <?php if (isset($errormsg1)) { echo $errormsg1; } ?>
                            </span>
                            <span class="text-danger">
                                    <?php if (isset($category_error)) echo $category_error ;  ?>
                            </span> 
                        </div> 
                    </div>
                </div>
               


                <div class="row">
                    <div class="col-sm-12">
                        <h4 id="categoryhead"><b>Give keyword for your product</b></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="title" id="title" value="" onkeyup="textCounter(this,'counter0',100);" maxlength="100" placeholder="e.g : LCD,Washing Machine etc." required class="form-control"/>
                            <input disabled  maxlength="3" size="3" value="100" id="counter0" class="btn btn-default pull-right" style="width:50px;margin-top:10px;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h4 id="categoryhead"><b>Write something about your product specification</b></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea  rows="4" cols="50" id="description" value="" name="description" placeholder="Warranty, Make, Delivery Time,Color, Size etc."  required class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="file" name="image"  >
                        </div>
                    </div>
                </div>

                

                <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div id="msg">
                                    <span class="text-success">
                                        <?php if (isset($errormsg)) { echo $errormsg; } ?>
                                    </span>
                                    
                                </div>  
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div id="addpost">
                                    <br>
                                    <b><input id="submitpost" class="btn btn-success" type="submit" name="AddQR" value="POST" /></b>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <br> <br>
                


              



            </form>



        </div>

        <div class="col-sm-2"></div>


    </div>


</div>

 <!-- ADD CATEGORY-->

<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="Addcategoriesform">

                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <p id="modaltitle" class="modal-title">Enter category name</p>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                        <input type="text" name="categoriesadd" id="title1" value="" placeholder="Mobile, Laptop, LCD, Kitchen, Accessories..." required class="form-control"/>
                                </div>
                            </div>

                        
                            <div class="modal-footer">
                            <input class="btn btn-default pull-right" type="submit" name="Addcategories" value="ADD" />
                            
                            </div>
                        </div>
                
                    </div>
                </div>
</form> 

<?php
} else {
    header("Location: index");
}
?>

<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>


</body>
</html>