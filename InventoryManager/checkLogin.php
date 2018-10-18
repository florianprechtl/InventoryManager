<?php
	include("connectDB.php");
	
    $db = connectToDB();

	$username = $_POST['username'];
    $password = $_POST['password'];
    
    echo $username . " entered the password " . $password . "<br>"; 
    checkUserAccountInformation($username, $password, $db);

    
    function checkUserAccountInformation($username, $password, $db) {
        $sql = "SELECT * FROM user WHERE Name = '$username'";
        
        $result = $db->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['Password'] == $password) {
                    echo "Login succesfull <br>";
                    echo "userNr: " . $row['UserNr']. " -         Name: " . $row['Name']. " -          Password: " . $row['Password']. "<br>";
                } else {
                    echo "Login denied, wrong password <br>";
                }
            }
        } else {
            echo "There is no user with the name: <b>$username</b><br>";
        }
    }
?>