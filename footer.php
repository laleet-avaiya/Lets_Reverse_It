
<html lang="en">
<head>
     <link rel="stylesheet" href="css/footer.css"> 
</head>

<body>

    <div class="container-fluid" style="background-color: #37475a;" >
    <div class="container" style="padding-top:15px;background-color: #37475a; " >
                  
                        <span > <a href="aboutus" id="rowelement">About Us</a></span>
                        <span > <a href="privacypolicy" id="rowelement">Privacy Policy</a></span>
                        <span > <a href="termsandcondition" id="rowelement">Terms Of Use</a></span>
                      
                        <span id="copyyear"> 
                          <a href="#" id="rowelement">
                              &copy; <?php
                              $copyYear = 2018; 
                              $curYear = date('Y'); 
                              echo $copyYear.(($copyYear != $curYear) ? '-' . $curYear : '');
                              ?> Letsreverseit.com
                          </a>
                        </span>
            
    </div>
    </div>


    
    <section id="backtotop" class="text-center" onclick="topFunction()" style="background-color: #37475a;">
    Back to top
    </section>


    <script type="text/javascript" src="js/backtotop.js"></script>


</body>

</html>