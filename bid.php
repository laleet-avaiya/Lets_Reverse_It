<?php session_start(); ob_start();?>

<?php

    include_once 'dbconnect.php';
    include_once 'timeago.php';

    $txt= $_GET['id'];
    
    /* QR DATA WITH USER*/
    $result = mysqli_query($con,"SELECT * FROM qrdata WHERE id = '{$txt}'" );
    $row = mysqli_fetch_array($result);

    /* To store User DATA while proposal submit*/
    if(isset($_SESSION['usr_name'])){ 
    $result2 = mysqli_query($con,"SELECT * FROM users WHERE name = '{$_SESSION['usr_name']}' AND id = '{$_SESSION['usr_id']}' ");
    $row1=mysqli_fetch_array($result2);
    }

    /* All Proposal Data*/ 
    $result1 = mysqli_query($con,"SELECT  * FROM biddata WHERE postid = '{$txt}'" );

    /* Count Total Number of Proposal*/
    $result3 = mysqli_query($con,"SELECT * FROM biddata WHERE postid = '{$txt}'"   );
    $count=mysqli_num_rows($result3);
    
   
    /* Count Number of Proposal From Same User*/
    if(isset($_SESSION['usr_id'])){ 
    $result4 = mysqli_query($con,"SELECT count(*) AS count FROM biddata WHERE biduserid = '{$_SESSION['usr_id']}' && postid = '{$_GET['id']}' " );
    $row4 = mysqli_fetch_array($result4);
    $count4 = $row4['count'];
    }

    /* To Show of Proposal From Same User*/
    if(isset($_SESSION['usr_id'])){ 
    $result5=mysqli_query($con,"select * from biddata WHERE biduserid = '{$_SESSION['usr_id']}' && postid = '{$_GET['id']}'" );
    $row5=mysqli_fetch_array($result5);
    }

     /* Show Contact Admin*/
     $result2 = mysqli_query($con,"SELECT * FROM qrdata WHERE id = '{$txt}'" );
     $row2=mysqli_fetch_array($result2);
     
     
     
        

    

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            <?php echo $row['title'];?>
        </title>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link rel="stylesheet" href="css/bid.css"> 
       
    </head>

<body>

  
<!-- For Bad Request-->

<?php if ($row['id'] != NULL)  { ?>

    <!-- NAV BAR -->
        <?php include 'navbar.php' ?>
        
    <!-- Project Title and Proposal Submit button -->      
        <?php  include_once 'bidpagesupport/project_nav.php'; ?>

    <div class="container">

        <br>

        <!-- Proposal Submit Form -->
                <?php  if(isset($_SESSION['usr_id'])){ 

                        if($count4>0){ 
                            include_once 'bidpagesupport/update_proposal.php';
                        } else{ 
                            include_once 'bidpagesupport/submit_proposal.php'; 
                        } 
                } ?>   

        <br>
        <!-- Project description and About User -->
                <?php  include_once 'bidpagesupport/project_detail.php'; ?>

        <br>

        <!-- Proposal On this Post -->
        <?php if($count > 0)  {?>
            <?php  include_once 'bidpagesupport/all_proposal.php'; ?>
        <?php } else { 
            echo '<br><br><br><center><h2 style="font-family:monospace;">  No proposals yet. <br><br><br><br></h2></center>';
        } ?>

    </div>

    <?php  include_once 'bidpagesupport/model.php'; ?>
    <script type="text/javascript" src="bidpagesupport/projectbid.js"></script>
      
<?php } else { 
           
            header("Status: 404 Not Found");
            echo "<center ><h1 ><br><br><br><br><br><br><br>404. That’s an error.<br>
            The requested URL was not found on this server.</h1></center>";
            
                        
 } ?>



    
</body>
</html>