<?php
	include('../common/connectDB.php');
    include('../common/basicFunctions.php');
	
    $db = connectToDB();

	$username = $_POST['username'];
    $password = $_POST['password'];
    
    echo $username . " entered the password " . $password . "<br>"; 
    checkUserAccountInformation($username, $password, $db);

    
    function checkUserAccountInformation($username, $password, $db) {
        $sql = "SELECT * FROM user WHERE Username = '$username'";
        
        $result = $db->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['Password'] == $password) {
                    echo "Login succesfull <br><br>";
                    echo "UserNr: " . $row['UserNr'].
                        "<br>Userame: " . $row['Username'].
                        "<br>Password: " . $row['Password'].
                        "<br>Firstname: " . $row['Firstname'].
                        "<br>Lastname: " . $row['Lastname'].
                        "<br>Sex: " . $row['Sex'].
                        "<br>Member since: " . $row['MemberSince'].
                        "<br>";
                    echo "<div class='padding-bottom'><a href='../inventory/inventory.php'>Go to Main Page</a></div>";
                    redirect('../inventory/inventory.php');
                } else {
                    echo "Login denied, wrong password <br>";
                    redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?loginDenied=wrongPassword');
                }
            }
        } else {
            echo "There is no user with the name: <b>$username</b><br>";
            redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?loginDenied=userUnknown');
        }
    }
?>