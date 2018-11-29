<!-- echo are ephemeral, we will not see this intermediate page at the end -->

<?php
	include('../common/connectDB.php');
    include('../common/basicFunctions.php');

    // Connect to the database
    $db = connectToDB();

    // Validation and sanitization
    // Username
    if (isset($_POST['username'])) {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    } else {
        $username = null;
    }
    // Password
    if (isset($_POST['password'])) {
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    } else {
        $password = null;
    }

    checkUserAccountInformation($username, $password, $db);

    
    function checkUserAccountInformation($username, $password, $db) {
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if (password_verify($password, $row['Password'])) {
                    echo "Login succesfull <br><br>";
                    echo "UserNr: " . $row['UserNr'].
                        "<br>Username: " . $row['Username'].
                        "<br>Password: " . $row['Password'].
                        "<br>Firstname: " . $row['Firstname'].
                        "<br>Lastname: " . $row['Lastname'].
                        "<br>Sex: " . $row['Sex'].
                        "<br>Member since: " . $row['MemberSince'].
                        "<br>";
                    echo "<div class='padding-bottom'><a href='../inventory/inventory.php'>Go to Main Page</a></div>";
                    session_start();
                    $_SESSION['user_nr'] = $row['UserNr'];
                    $_SESSION['user_name'] = $row['Username'];
                    $_SESSION['inventory_nr'] = null;
                    redirect('../inventory/inventory.php');
                } else {
                    redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?loginDenied=wrongPassword');
                }
            }
        } else {
            redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?loginDenied=userUnknown');
        }
    }
?>
