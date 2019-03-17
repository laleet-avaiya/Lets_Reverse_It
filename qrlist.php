<?php session_start(); ob_start();?>
<?php

include_once 'dbconnect.php';
include_once 'timeago.php';


// Add QRDATA in Database.
if(isset($_GET['categories'])) {
    $txt= $_GET['categories'];

    if(isset($_SESSION['usr_id'])){ 
    $result = mysqli_query($con,"SELECT * FROM qrdata WHERE categories = '{$txt}' AND (postedid != '{$_SESSION['usr_id']}')" );
    }else{
    $result = mysqli_query($con,"SELECT * FROM qrdata WHERE categories = '{$txt}'" );
    }

    if(isset($_SESSION['usr_id'])){ 
        $result1 = mysqli_query($con,"SELECT count(*) AS count FROM qrdata WHERE (categories = '{$txt}') AND (postedid != '{$_SESSION['usr_id']}')" );
    }else{
        $result1 = mysqli_query($con,"SELECT count(*) AS count FROM qrdata WHERE (categories = '{$txt}') " );
    }
        $row1 = mysqli_fetch_array($result1);
        $count = $row1['count'];

}

if(isset($_GET['city'])) {
    $txt= $_GET['city'];

    if(isset($_SESSION['usr_id'])){ 
    $result = mysqli_query($con,"SELECT * FROM qrdata WHERE city = '{$txt}' AND (postedid != '{$_SESSION['usr_id']}')" );
    }else{
    $result = mysqli_query($con,"SELECT * FROM qrdata WHERE city = '{$txt}'" );
    }

    if(isset($_SESSION['usr_id'])){ 
        $result1 = mysqli_query($con,"SELECT count(*) AS count FROM qrdata WHERE (city = '{$txt}') AND (postedid != '{$_SESSION['usr_id']}')" );   
    }else{
        $result1 = mysqli_query($con,"SELECT count(*) AS count FROM qrdata WHERE (city = '{$txt}')" );   
    }
    $row1 = mysqli_fetch_array($result1);
    $count = $row1['count'];

}
    

    

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Submit Proposal</title>
        <link rel="stylesheet" href="css/qrlist.css">

       

    </head>

    <body style="background-color:#f3f3f3;">

      

         
<!-- NAV BAR --> 
<div style="width:100%;height:auto;background-color:#ffff;">
        <?php include 'navbar.php' ?>
</div>




<?php if($count > 0)  {?>
           
                <div class="container">
                    <br>
                    <input class="form-control " id="myInput" type="text" placeholder="Search.." style="height:45px;">
                    <br>
                </div>
           


        <div class="container">


            <div class="panel panel-default">
                        <div class="panel-heading" style="background:rgba(43, 66, 70, 1);" > <b style="color:white;font-size:15px;"> Market Demands... </b></div>
                <div class="panel-body" style="padding:0px 16px 0px 16px;">

                
                        <?php while($row=mysqli_fetch_array($result)): ?>

                      

                            <div class="row" id="myTable" >
                                    <a href="bid?id=<?php echo $row['id'];?>">
                                        <div class="row">
                                            
                                                                <div class="col-sm-12 col-xs-12" id="title">
                                                                    <b>
                                                                    <?php echo $row['title'];?>
                                                                    </b>
                                                                </div>
                                                    
                                        </div>

                                        <div class="row" style="color:#555;">
                                                <br>
                                                    <div class="col-sm-4 col-xs-12">
                                                    <?php echo " <b> Request Submited: <b>" . $time_elapsed = timeAgo($row['date']); ?>
                                                    </div>
                                                    <div class="col-sm-4 col-xs-12">
                                                        <?php echo "<b> Posted By : </b>"  .$row['postedby']; ?> 
                                                    </div>
                                                    <div class="col-sm-4 col-xs-12">
                                                        <?php echo "<b> Location : </b>" . $row['city']; ?>
                                                        <?php echo "," . $row['state']; ?>
                                                        <?php echo "," . $row['country']; ?>
                                                    </div>
                                                    
                                        </div>
                                       
                                    </a>
                                    
                            </div>
                                
                       
                        <?php endwhile;?>
                
                
                </div>

            </div>

                <script>
                    $(document).ready(function () {
                        $("#myInput").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            $("#myTable ").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>

               



        </div>

        <?php } else { 
    echo '<br><br><br><center><h2 style="font-family:monospace;">No quatation requests found.<br><br><br><br> </h2></center>';
 } ?>



    </body>

    </html>