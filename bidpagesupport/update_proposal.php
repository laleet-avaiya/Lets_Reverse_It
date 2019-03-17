<?php 
/* Update Bids*/ 
        if (isset($_POST['update'])) {

            $biddetails= mysqli_real_escape_string($con, $_POST['biddetails']);
            $bidamount = mysqli_real_escape_string($con, $_POST['bidamount']);
            $date = date("Y-m-d H:i:s");

            if(mysqli_query($con, "UPDATE biddata SET biddetails='$biddetails' ,bidamount='$bidamount',date='$date' WHERE biduserid = '{$_SESSION['usr_id']}' && postid = '{$_GET['id']}' " ) ) 
            {   
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

        <form role="form"   method="post" name="Addform">

            <div class="form-group">
                <h5 class="text-danger">Your proposal is already submitted, update it if you want</h5> 
                <br>
                <label>Amount </label>
                <input type="text" name="bidamount" value="<?php echo $row5['bidamount']; ?>" placeholder="Amount [Example: Rs. 500 / $ 1000 ]" required class="form-control"/>
            </div>

            <div class="form-group">
                <label>Proposal Details </label>
                <textarea rows="4" cols="50" id="description" name="biddetails" placeholder="Description" onkeyup="textCounter(this,'counter',250);" maxlength="250"   required class="form-control">
                <?php echo $row5['biddetails'];?>
                </textarea>

                <input disabled  maxlength="3" size="3" value="250" id="counter" class="btn btn-default pull-right" style="width:50px;margin-top:10px;">
  
                
            </div>

            <div class="form-group">
                <input type="submit" name="update"  value="Update" class="btn btn-default w3-border-green" />
            </div>

            <span class="text-danger">
            <?php if (isset($errormsg)) { echo $errormsg; } ?>
            </span>

        </form>
    </div>
</div>
</div>  