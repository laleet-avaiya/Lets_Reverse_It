<div class="panel panel-default">
                    <div class="panel-heading" style="background:rgba(43, 66, 70, 1);" > <b style="color:white;font-size:15px;"> Proposal On This Post : </b></div>
            <div class="panel-body" style="padding:0px 16px 0px 16px;">

            
                    <?php while($row=mysqli_fetch_array($result1)): ?>
                

                        <div class="row" id="myTable" >

                                    <div class="row">
                                        
                                                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9" id="title1">
                                                                <b>
                                                                <?php echo nl2br($row['biddetails']);?>
                                                            
                                                                </b>
                                                            </div>

                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" id="amount">
                                                                <b>
                                                                <?php echo $row['bidamount'];?>
                                                            
                                                                </b>
                                                            </div>
                                                
                                    </div>

                                    <div class="row" style="color:#555;">
                                            <br>
                                                

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                    <?php echo "<b> Proposal By : </b>"  .$row['biduser']; ?> 
                                                </div>

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                <?php echo " <b> Proposal Submited: </b>" . $time_elapsed = timeAgo($row['date']); ?>
                                                    
                                                </div>
                                            

                                       <?php if(isset($_SESSION['usr_id'])){  ?>

                                                <?php if ($row2['postedid']==$_SESSION['usr_id']) { ?>

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                    <?php echo "<b> Address :  </b>" . nl2br($row['Address']);  ?>
                                                </div>

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                <?php echo "<b> Contact :  </b>" . $row['phone'];?>
                                                </div>
                                            
                                            <?php } ?>
                                        
                                        <?php } ?>
                                                
                                    </div>
                                
                             
                                
                        </div>
                            
                
                    <?php endwhile;?>
            
            
            </div>
        </div>