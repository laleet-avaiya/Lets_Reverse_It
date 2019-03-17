<?php ob_start();?>



<?php
$servername = "mysql.hostinger.in";
$username = "u197349189_mahi";
$password = "mahi@7373";
$dbname = "u197349189_lri";

	// Create connection
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
		if (!$con) {
			//die("Connection failed: " . mysqli_connect_error());
			header("Location:error"); 
		 
		
		}
	// 		echo "Connected successfully";
?>
