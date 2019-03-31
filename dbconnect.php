<?php ob_start();?>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u197349189_mahi";

	// Create connection
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
		if (!$con) {
			//die("Connection failed: " . mysqli_connect_error());
			header("Location:error"); 
		 
		
		}
	// 		echo "Connected successfully";
?>
