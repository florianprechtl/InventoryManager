<?php
    include('connectDB.php');

    $db = connectToDB();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $newusername = $_POST['newusername'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $psw = $_POST['psw'];
    $repeatedpsw = $_POST['repeatedpsw'];
    
    $dateRegister = date("Y-m-d");

        // inspiré
        if ($psw == $repeatedpsw)
        {
        echo "  New account ";
        $sql_user= "INSERT INTO user (UserNr, Username, Firstname, Lastname, Password, Age, Sex, MemberSince)
        VALUES (NULL, '$newusername', '$firstname', '$lastname','$psw', $age, '$sex?$sex:o', '$dateRegister')";
        echo $sql_user; 
        $db->query($sql_user);
        }
        
        else { 
            echo "  Password does not equals, try it again  ";
            echo "<div class='btn btn-primary'><a href='registermodal.php'>Do the demand again</a></div>";
             }
?>
