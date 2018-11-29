<!-- As its name indicates, this code is to place the characteristics of new users into the db-->

<?php
    include('../../common/connectDB.php');
    include('../../common/basicFunctions.php');

    // Connecting to the database
    $db = connectToDB();

    // Setting up variables
    $usernr = null;

    // Validation and sanitization
    // Firstname
    if (isset($_POST['firstname'])) {
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    } else {
        redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
    }
    // Lastname
    if (isset($_POST['lastname'])) {
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    } else {
        redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
    }
    // Username
    if (isset($_POST['newusername'])) {
        $newusername = filter_var($_POST['newusername'], FILTER_SANITIZE_STRING);
    } else {
        redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
    }
    // Age
    if (isset($_POST['age'])) {
        $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
    }
    // Sex
    if (isset($_POST['sex'])) {
        $sex = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);
    } else {
        redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
    }
    // Password
    if (isset($_POST['psw'])) {
        $psw = filter_var($_POST['psw'], FILTER_SANITIZE_STRING);
    } else {
        redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
    }
    // Repeated password
    if (isset($_POST['repeatedpsw'])) {
        $repeatedpsw = filter_var($_POST['repeatedpsw'], FILTER_SANITIZE_STRING);
    } else {
        redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
    }

    // Get current date
    $dateRegister = date("Y-m-d");

        // Check if user entered equal passwords
        if ($psw == $repeatedpsw) {
            $psw = password_hash($psw, PASSWORD_DEFAULT);
            $sql= "INSERT INTO user (UserNr, Username, Firstname, Lastname, Password, Age, Sex, MemberSince)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('issssiss', $usernr, $newusername, $firstname, $lastname, $psw, $age, $sex, $dateRegister);
            print_r($stmt);
            echo "<br>";
            $stmt->execute();
            echo $stmt->get_result();
            echo "<br>";
            print_r($stmt);
            //redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=true');
        } else {
            redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
        }
?>
