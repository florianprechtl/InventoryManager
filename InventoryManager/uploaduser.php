<?php
    include('connectDB.php');
    $db = connectToDB();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $newusername = $_POST['newusername'];
    $age = $_POST['ager'];
    $sex = $_POST['sex'];
    $psw = $_POST['psw'];
    $repeatedpsw = $_POST['repeatedpsw'];
    
    /*$datetotest = 
    $date_register = convertDate($datetotest]);*/

        // inspiré
        if ($psw == $repeatedpsw)
        {
        echo "Account creation in process";
        $sql_user= "INSERT INTO user (UserNr, Username, Firstname, Lastname, Password, Age, Sex, MemberSince)
        VALUES (NULL, '$newusername', '$firstname', 'lastname','$psw', '$age', 'm', '2018-01-01')";
        echo $sql_user; 
        $db->query($sql_user);
        }
        
        else { echo "Password not equals, do it again";}

    function convertDate($date) {
        echo $date.'<br>';
        echo "date gets converted";
        // converts form mm/dd/yyyy to yyyy-mm-dd
        $result = explode('/', $date);
        return $result[2].'-'.$result[1].'-'.$result[0];
    }
?>
