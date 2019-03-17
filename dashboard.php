<?php session_start(); ob_start();?>
<?php

include_once 'dbconnect.php';
include_once 'timeago.php';

// Retrive Self Posted Data From QRDATA Table
$result1=mysqli_query($con,"select  count(*) AS count from qrdata WHERE postedid = '{$_SESSION['usr_id']}' ORDER BY id ");

$result=mysqli_query($con,"select  * from qrdata WHERE postedid = '{$_SESSION['usr_id']}' ORDER BY id DESC ");
$row1 = mysqli_fetch_array($result1);
$count = $row1['count'];


if(isset($_GET['delete_id']))
{
    
$sql = "DELETE FROM qrdata WHERE id=".$_GET['delete_id'];

if (mysqli_query($con, $sql)) {
    header("Location: dashboard");
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

 
 
}



?>


<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    
    <script type="text/javascript">
        function delete_id(id)
        {
         if(confirm('Sure To Remove This Record ?'))
         {
          window.location.href='dashboard?delete_id='+id;
         }
        }
    </script>
   
</head>

<body style="background-color:#f3f3f3;">



<?php if(isset($_SESSION['usr_id']))  {?>
   
        
        <!-- NAV BAR -->
        <div style="width:100%;height:auto;background-color:#ffff;">
        <?php include 'navbar.php' ?>
        </div>


        <?php if($count > 0)  {?>

    <!-- Search -->
<div class="container">

            <br>
                <input id="myInput" class="form-control" type="text" placeholder="Search.." >
            <br>
       
    


<!-- User Post -->

    
   
    <p>My Requests</p>
    <hr>


    <div class="panel panel-default">

            <table class="table"  >

                    <div class="row">
                        <thead>
                            <tr id="thead" >
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><th class="text-center">No.</th></div>
                                <div class="col-xs-9 col-sm-9 col-md-10 col-lg-10"><th>Title</th></div>
                                <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"><th>Posted</th></div>
                            </tr>
                        </thead>
                    </div>

                <tbody id="myTable">

                        <?php $a=0;?>

                        <?php while($row=mysqli_fetch_array($result)): ?>

                                <?php if ($row['postedby']== $_SESSION['usr_name'] && $row['postedid']== $_SESSION['usr_id']) { ?>

                                    <div class="row">
                                        <tr>
                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" > 
                                                <td class="text-center">
                                                    <a  id="qrtitle" href="bid?id=<?php echo $row['id'];?>"><?php echo $a=$a+1; ?></a> 
                                                </td> 
                                            </div>
                                            <div class="col-xs-9 col-sm-9 col-md-10 col-lg-10">
                                                <td>
                                                    <a  id="qrtitle" href="bid?id=<?php echo $row['id'];?>">
                                                        <?php echo $row['title'];?>      
                                                    </a>  
                                                </td>
                                            </div>
                                            <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
                                                <td id="posteddate">
                                                    <a id="qrtitle" href="bid?id=<?php echo $row['id'];?>"> 

                                                        <?php echo $time_elapsed = timeAgo($row['date']); ?>
                                                    </a>  
                                                    <button type="button" class="close" onClick="delete_id(<?php echo $row[id]; ?>);">&times;</button>
                                                    
                                                </td>
                                            </div>                               
                                        </tr>    
                                    </div>

                                <?php    } ?>
                        <?php endwhile;?>

                </tbody>

            </table>

    </div>
</div>


<?php } else { 
    echo '<br><br><br><center><a href="AddQuotationRequest"><input type="submit" value="Add Quotation Request" class="btn btn-success" /></a><br><br><br></center>';
 } ?>
      


<?php } else { header("Location: index"); } ?>

<script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
</script>




</body>
</html>

