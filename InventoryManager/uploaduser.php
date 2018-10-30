<?php
    include('connectDB.php');
    include('basicFunctions.php');

    $db = connectToDB();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $newusername = $_POST['newusername'];
    $age = $_POST['ager'];
    // $sex = $_POST['sex'];
    $psw = $_POST['psw'];
    $repeatedpsw = $_POST['repeatedpsw'];
    
    $dateRegister = convertDate(new Date());

        // inspiré
        if ($psw == $repeatedpsw)
        {
        echo "  New account ";
        $sql_user= "INSERT INTO user (UserNr, Username, Firstname, Lastname, Password, Age, Sex, MemberSince)
        VALUES (NULL, '$newusername', '$firstname', '$lastname','$psw', '15', 'm', '2018-01-01')";
        echo $sql_user; 
        $db->query($sql_user);
        }
        
        else { 
            echo "  Password not equals, do it again  ";
            echo "<div class='btn btn-primary'><a href='registermodal.php'>Do the demand again</a></div>";
             }

    function convertDate($date) {
        echo $date.'<br>';
        echo "date gets converted";
        // converts form mm/dd/yyyy to yyyy-mm-dd
        $result = explode('/', $date);
        return $result[2].'-'.$result[1].'-'.$result[0];
    }
?>
