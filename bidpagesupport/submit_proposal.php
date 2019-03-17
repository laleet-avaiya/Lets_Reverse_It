<?php 

        if (isset($_POST['post'])) {
        $postid=$_GET['id'];
        $biduser = $_SESSION['usr_name'];
        $biduserid = $_SESSION['usr_id'];
        $biddetails= mysqli_real_escape_string($con, $_POST['biddetails']);
        $bidamount = mysqli_real_escape_string($con, $_POST['bidamount']);
        $date = date("Y-m-d H:i:s");
        $address = $row1['addline1'].",".$row1['addline2'].",".$row1['city'].",".$row1['state'].",".$row1['country'];
        $phone = $row1['mobile'];
        
            if(mysqli_query($con, "INSERT INTO biddata(postid,biduserid,biduser,phone,address,biddetails,bidamount,date) VALUES('" . $postid . "','" . $biduserid . "','" . $biduser . "','" . $phone . "','" . $address . "', '" . $biddetails . "' ,'". $bidamount ."','". $date ."')")) {
               
                header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); 
                exit;
            
            } else {
                $errormsg = "Error in processing the request, please try again.";
            }
        }

        ?>

<div id="demo" class="collapse ">

<div class="panel panel-default">
    <div class="panel-body">
        <form role="form"  method="post" name="Addform">

            <div class="form-group">
                <label>Amount </label>
                <input type="text" name="bidamount" value="" placeholder="Amount [Example: Rs. 500 / $ 1000 ]" required class="form-control"
                />
            </div>

            <div class="form-group">
                <label>Proposal Details </label>
                <textarea rows="4" cols="50" id="description" value="" name="biddetails" placeholder="Description" onkeyup="textCounter(this,'counter',250);" maxlength="250"   onfocus=" this.value = '';"  required class="form-control">    
                </textarea>

                <input disabled  maxlength="3" size="3" value="250" id="counter" class="btn btn-default pull-right" style="width:50px;margin-top:10px;">
            </div>


            <div class="form-group">
                <input type="submit" name="post"  value="Submit" class="btn btn-default w3-border-green" />
            </div>

            <span class="text-danger">
                <?php if (isset($errormsg)) { echo $errormsg; } ?>
            </span>

        </form>
    </div>
</div>
</div>  