<?php
    include('../../common/connectDB.php');
    include('../../common/basicFunctions.php');

    $db = connectToDB();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $newusername = $_POST['newusername'];
    $age = $_POST['age'];
    $sex = empty($_POST['sex']) ? "NULL" : "'$_POST[sex]'";
    $psw = $_POST['psw'];
    $repeatedpsw = $_POST['repeatedpsw'];
    print_r($_POST);
    
    $dateRegister = date("Y-m-d");

        // inspiré
        if ($psw == $repeatedpsw) {
            echo "  New account ";
            $sql_user= "INSERT INTO user (UserNr, Username, Firstname, Lastname, Password, Age, Sex, MemberSince)
                        VALUES (NULL, '$newusername', '$firstname', '$lastname','$psw', $age, $sex, '$dateRegister')";
            echo $sql_user;
            $db->query($sql_user);
            redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=true');
        } else {
            redirect(explode('?', $_SERVER['HTTP_REFERER'])[0] . '?registerSuccessful=false');
        }
?>
