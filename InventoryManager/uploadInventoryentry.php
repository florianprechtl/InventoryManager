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

    if ($name_prod_gr && trim($name_prod_gr) != '') {
        $sql_prod_gr = "INSERT INTO productgroup (ProdgrNr, Name, Description, NameShort, IconName, IconExtension) VALUES (NULL, $name_prod_gr, $descr_prod_gr, NULL, NULL, NULL)";
        $result = $db->query($sql_prod_gr);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                print_r($row);
            }
        }
            
    }
    echo "worked as well!";

//    if (isset($name_product)) {
//        $sql_product = "INSERT INTO product (ProdNr, ProdgrNr, Name, Description, Unit, ImageName, ImageExtension) VALUES ('7', '3', 'Nutella', 'chocolate creame', 'kg', NULL, NULL);"
//    }
//
//    if (isset($name_product) && isset($name_prod_gr)) {
//        $sql_inventoryentry = "INSERT INTO inventoryentry (InventoryEntryNr, InventoryNr, ProductNr, UserNr, Amount, BuyingDate, ExpiringDate, Status) VALUES (NULL, '1', '5', '3', '12', $date_buying, $date_expiring, NULL);"
//    }


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
