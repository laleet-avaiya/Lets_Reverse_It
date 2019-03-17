<nav class="navbar" style="background: rgba(43, 66, 70, 1);">
                    <div class="container">
                        <br>
                        <br>
                        <div class="row">

                        
                    
 
  <?php if(isset($_SESSION['usr_id'])){  ?>

                            <?php if ( $row2['postedid']==$_SESSION['usr_id']) { ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">
                            <?php    } else { ?>   
                                    <div class="col-xs-8 col-sm-8 col-md-10  col-lg-10">  
                            <?php    } ?>    

  <?php    } else { ?>   

      <div class="col-xs-8 col-sm-8 col-md-10  col-lg-10">  
      <?php    } ?>  



                                <p id="title" >
                                    <?php echo $row['title'];?>
                                </p>

                            </div>


                    <?php if(isset($_SESSION['usr_id'])){  ?>

                            <?php if ($row['postedid']!==$_SESSION['usr_id']) { ?>

                                <?php if ($row1['pincode']!=='' && $row1['city']!=='' && $row1['state']!==''   && $row1['country']!==''  && $row1['shopname']!=='' && $row1['addline1']!=='' && $row1['addline2']!=='') { ?>

                                    <div class="col-xs-4 col-sm-4 col-md-2  col-lg-2">

                                        
                                        <button id="sp" class="btn btn-success" data-toggle="collapse" data-target="#demo">Submit Proposal </button>
                                        
                                    
                                    </div>

                                
                                 <?php    } else {  ?> 

                                    <div class="col-xs-4 col-sm-4 col-md-2  col-lg-2">      
                           
                                    <button id="sp" class="btn btn-success" data-toggle="modal" data-target="#completedetail" >Submit Proposal </button>
                                                  
                            

                            </div>

                         <?php    } ?>

                            <?php    } ?>
                    
                        <?php    } else {  ?> 
                            <div class="col-xs-4 col-sm-4 col-md-2  col-lg-2">      
                           
                            <button id="sp" class="btn btn-success" data-toggle="modal" data-target="#myModal" >Submit Proposal </button>
                                                  
                            

                            </div>

                         <?php    } ?>

                        </div>
                        
                    </div>
                </nav>