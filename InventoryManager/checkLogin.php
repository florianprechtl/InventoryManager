<?php
	include("connectDB.php");
	
    $db = connectToDB();

	$username = $_POST['username'];
    $password = $_POST['password'];
    
    echo $username . " entered the password " . $password; 
    checkUserAccountInformation($username, $password, $db);

    
    function checkUserAccountInformation($username, $password, $db) {
        echo $username . "<br>";
        $sql = "SELECT * FROM user WHERE Name = '$username'";
        
        $result = $db->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['Password'] == $password) {
                    echo "Einloggen erfolgreich <br>";
                    echo "userNr: " . $row['UserNr']. " - Name: " . $row['Name']. " " . $row['Password']. "<br>";
                }
            }
        } else {
            echo "0 results";
        }
    }
?>