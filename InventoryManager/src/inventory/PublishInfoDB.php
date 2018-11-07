<!-- Meme code mais pour afficher une valeur particulière -->
<?php

	include("../common/connectDB.php");
	
    $db = connectToDB();
  	$variablename = $_POST['variablename'];
  
    
    echo $variablename . " c est le nom qui sert de variable " ; 

    
    function PublishInfo($variablename, $db) {
        $sql = "SELECT * FROM product WHERE Name = '$variablename'";
        
        $result = $db->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {      
                    echo "<b>$oui</b> " . $row['UserNr'].                       
                        "<br>";
                    echo "<div class='padding-bottom'><a href='inventory.php'>Go to Main Page</a></div>";
            }
        } else {
            echo "There is no name: <b>$username</b><br>";
        }
    }
?>
