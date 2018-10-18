<?php
	include("connectDB.php");
	
    $db = connectToDB();

	$username = $_POST['username'];
    $password = $_POST['password'];
    
    echo $username . " entered the password " . $password; 
    checkUserAccountInformation($username, $db);
    echo "1";

    
    function checkUserAccountInformation($username, $db) {
        echo "2";
        $sql = "SELECT * FROM user";
        
        $result = $db->query($sql);
        echo "3";
        
        if ($result->num_rows > 0) {
            echo "4";
            while($row = $result->fetch_assoc()) {
                echo "userNr: " . $row['UserNr']. " - Name: " . $row['Name']. " " . $row['Password']. "<br>";
            }
        } else {
            echo "0 results";
        }
        echo "5";
    }
?>