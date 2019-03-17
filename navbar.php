<?php ob_start();?>

<?php
include_once 'dbconnect.php';
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/navbar.css">

    </head>

    <body >

        <div class="topnav" id="myTopnav" style="background-color:white;">
            <div class="container">

                <a href="index">
                    <b style="font-size:20px;">Let's </b> <b style="font-size:20px; color: #4CAF50;">Reverse</b> <b style="font-size:20px;">It</b>
                </a>

            

              

                 <?php if(isset($_SESSION['usr_id'])){  ?>
                <a href="dashboard">My Post</a>
                <a href="AddQuotationRequest">Quotation Request</a>
                <?php    } else {  ?> 
                <a href="#" data-toggle="modal" data-target="#myModal">My Post</a>
                <a href="#" data-toggle="modal" data-target="#myModal">Quotation Request</a>
                <?php    } ?>

                <a href="categories">Submit Quotations</a>
              





                <div id="user">

                    <a style="visibility: hidden;"></a>

                    <?php if (isset($_SESSION['usr_id'])) { ?>

                    <a href="user" style="text-transform:capitalize;">
                        <span class="glyphicon glyphicon-user"  ></span>
                        <?php echo ' '.$_SESSION['usr_name']; ?>
                    </a>

                    <?php    }  else { ?>

                    <a>
                        <?php echo "Welcome Guest" ?>
                    </a>

                    <?php } ?>


                   
            <?php if (isset($_SESSION['usr_id'])) { ?>


                    <a href="logout">
                        <span class="glyphicon glyphicon-log-out"></span> Logout</a>


            <?php    }  else { ?>

                    <a href="registration">
                        <span class="glyphicon glyphicon-user"></span> Sign Up</a>


                    <a href="login">
                        <span class="glyphicon glyphicon-log-in"></span> Login</a>

                    <?php } ?>



                </div>

                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>


            </div>

        </div>


        







        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
            <h3>Signup | Login First...</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
        </div>





        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>

        




    </body>

    </html>


   