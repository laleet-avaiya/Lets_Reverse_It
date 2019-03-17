<?php session_start(); ob_start();?>

<?php

include_once 'dbconnect.php';

$result=mysqli_query($con,"select DISTINCT  categories from categories WHERE id > '1' ORDER BY categories ASC");

$result1=mysqli_query($con,"select DISTINCT city from qrdata ORDER BY city ASC");
$rowcount=mysqli_num_rows($result1);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search by...</title>

    <link rel="stylesheet" href="css/categories.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body style="background-color:#f3f3f3;">

<?php // if(isset($_SESSION['usr_id']))  { ?>

<!-- NAV BAR --> 
<div style="width:100%;height:auto;background-color:#ffff;">
        <?php include 'navbar.php' ?>
</div>


      
                <div class="container">
                <br>
                
                <input class="form-control " id="myInput" type="text" placeholder="Search..." style="height:45px;">
                </br>
                </div>  
      


<div class="container">




<p id="headtag">Search by category</p>

<div class="panel panel-default" style="box-shadow: 0 0 10px 0 rgba(0,0,0,.08), 0 2px 4px 0 rgba(0,0,0,.12);">
    <div class="panel-body">

        <table >

            <ul id="myTable">
                        <?php while($row=mysqli_fetch_array($result)): ?>
                        
                        <?php  
                                $result2=mysqli_query($con,"select * from qrdata WHERE categories = '".$row['categories']."' ");
                                $rowcount2=mysqli_num_rows($result2);
                                //$rowcount2=11;
                        ?>
                            <li class="col-md-3 col-lg-4  col-sm-6 col-xs-12" ><a href="qrlist?categories=<?php echo $row['categories'];?>"> <?php echo $row['categories'] ;?>(<?php echo $rowcount2 ;?>)</a></li>
                        <?php endwhile;?>
            </ul>

        </table>   

    </div>
</div>

<?php if($rowcount>0){ ?>

<p id="headtag">Search by city</p>

<div class="panel panel-default" style="box-shadow: 0 0 10px 0 rgba(0,0,0,.08), 0 2px 4px 0 rgba(0,0,0,.12);">
    <div class="panel-body">

        <table >

            <ul id="myTable">
                        <?php while($row1=mysqli_fetch_array($result1)): ?>
                        
                         <?php  
                                $result3=mysqli_query($con,"select * from qrdata WHERE city = '".$row1['city']."' ");
                                $rowcount3=mysqli_num_rows($result3);
                                //$rowcount2=11;
                        ?>
                        
                            <li class="col-md-3 col-lg-4  col-sm-6 col-xs-12" ><a href="qrlist?city=<?php echo $row1['city'];?>" style="text-transform: uppercase;"> <?php echo $row1['city'] ;?>(<?php echo $rowcount3 ;?>)</a></li>
                        <?php endwhile;?>
            </ul>

        </table>   

    </div>
</div>

<?php } ?>


</div>  




<script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
</script>





<?php // } else { header("Location: index.php"); } ?>

</body>
</html>