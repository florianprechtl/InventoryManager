<!-- As its name indicates, this code is to place the characteristics of new users into the db-->

<?php
    include('../../common/connectDB.php');
    include('../../common/basicFunctions.php');

    $db = connectToDB();
    $usernr = null;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $newusername = $_POST['newusername'];
    $age = $_POST['age'];
    $sex = empty($_POST['sex']) ? "NULL" : "'$_POST[sex]'";
    $psw = $_POST['psw'];
    $repeatedpsw = $_POST['repeatedpsw'];
    print_r($_POST);
    
    $dateRegister = date("Y-m-d");

        // je me suis inspiré du uploadinventoryentry
        // ça marche
        if ($psw == $repeatedpsw) {

            $psw = password_hash($psw, PASSWORD_DEFAULT);

            $sql= "INSERT INTO user (UserNr, Username, Firstname, Lastname, Password, Age, Sex, MemberSince)
                        VALUES (NULL, '$newusername', '$firstname', '$lastname','$psw', $age, $sex, '$dateRegister')";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('issssisd', $usernr, $newusername, $firstname, $lastname, $psw, $age, $sex, $dateRegister);
            $stmt->execute();
            redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=true');
        } else {
            redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
        }
?>
