<?php
	include("connectDB.php");
	
    $db = connectToDB();

	$username = $_POST['username'];
    $password = $_POST['password'];
    
    echo $username . " entered the password " . $password; 
    checkUserAccountInformation($username);
    echo "Joooo";

    
    function checkUserAccountInformation($username) {
        echo "jooo";
        $sql = "SELECT * FROM user WHERE Name = $username;";
        
        $result = $db->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "userNr: " . $row['UserNr']. " - Name: " . $row['Name']. " " . $row['Password']. "<br>";
            }
        } else {
            echo "0 results";
        }
    }
?>

Insert into user (UserNr, Name, Password, Age, Sex, MemberSince) Values ('Flo', '21', 'Test')