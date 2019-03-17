<div class="panel panel-default">
                <div class="panel-body">


                    <p class="text-justify">
                        <?php echo nl2br($row['description']);?> </p>

                    <br>
                    <b>About User:</b>
                    <br>
                    <div class="row">

                        <div class="col-sm-4">
                            <?php echo "Posted By: "  .$row['postedby']; ?> </div>
                        <div class="col-sm-4">
                            <?php echo "Location: " . $row['city']; ?>
                            <?php echo "," . $row['state']; ?>
                            <?php echo "," . $row['country']; ?>
                        </div>
                        <div class="col-sm-4">
                            <?php echo "Request Submited:" . $time_elapsed = timeAgo($row['date']); ?>
                            
                        </div>

                    </div>

                    <br>
                    <b>
                        <?php echo "Post ID: "; ?>
                    </b>
                    <?php echo $row['id']; ?>

<?php if($row['image']!= " "){?>
                    <b><br><br>

                        <?php   
                                echo " <div class='row'>";
                                    echo "<div class='col-sm-4'>";
                                    echo "Attachment: ";
                                    echo "<a href='upload/".$row['image']."' download>"; 
                                    echo $row['image'];
                                    echo "</a>"; 
                                    echo "</div>"; 
                                echo "</div>"; ?>
                    </b>
                <?php } ?>     
               
 </b>

                </div>
            </div>