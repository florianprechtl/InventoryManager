<?php
	include("connectDB.php");
	
    connectToDB();

	$username = $_POST['username'];
    $password = $_POST['password'];
    
    echo $username . " entered the password " . $password; 
?>