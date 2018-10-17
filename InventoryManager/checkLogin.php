<?php
	include("connectDB.php");
	
    $db = connectToDB();
	$username = $_POST['username'];
    $password ? $_POST['password'];
    
    echo $username . " entered the password " . $password; 
?>