<?php
    include('connectDB.php');
    $db = connectToDB();

    $name_product = $_POST['name_product'];
    $descr_product = $_POST['desrc_product'];
    $name_prod_gr = $_POST['name_prod_gr'];
    $descr_prod_gr = $_POST['descr_prod_gr'];
    $unit = $_POST['unit'];
    $amount = $_POST['amount'];
    $date_buying = $_POST['date_buying'];
    $date_expiring = $_POST['date_expiring'];

    $

    echo "yeah it works!";

    if (isset($name_product, )) {
        
    }

//    $sql = "SELECT * FROM Inventory";
//
//    $result = $db->query($sql);
//
//    if (isset($_GET["inventory"])) {
//        if ($result->num_rows > 0) {
//            while($row = $result->fetch_assoc()) {
//                if ($_GET['inventory'] == $row[InventoryNr]) {
//                    echo "<option value='$row[InventoryNr]'  selected>$row[Name]</option>";
//                } else {
//                    echo "<option value='$row[InventoryNr]'>$row[Name]</option>";
//                }
//            }
//        }
//    } else {
//        if ($result->num_rows > 0) {
//            while($row = $result->fetch_assoc()) {
//                echo "<option value='$row[InventoryNr]'>$row[Name]</option>";
//            }
//        }
//    }
?>
