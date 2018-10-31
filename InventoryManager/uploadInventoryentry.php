<?php
    include('connectDB.php');
    include('basicFunctions.php');

    $db = connectToDB();

    $name_product = $_POST['name_product'];
    $descr_product = $_POST['descr_product'];
    $unit = $_POST['unit'];
    $amount = $_POST['amount'];
    $date_buying = convertDate($_POST['date_buying']);
    $date_expiring = convertDate($_POST['date_expiring']);
    $inventory = $_GET['inventory'];
    $imageBase64 = $_POST['imageBase64'];
    

    function insertProduct($db, $name, $descr, $unit, $imageBase64) {
        
        // set values of varaibles
        $name = $name != '' ? $name : null;
        $descr = $descr != '' ? $descr : null;
        $unit = $unit != '' ? $unit : null;
        
        
        $imageName = null;
        $data = null;
        $imageName = time() . '.png';
        $data = base64_decode($imageBase64);
        
        $sql = "SHOW TABLE STATUS WHERE name='product'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                print_r("<br><br>$row[Auto_increment]<br><br>");
            }
        }
        
        $sql = "INSERT INTO product (ProdNr, ProdgrNr, Name, Description, Unit, Image) VALUES (NULL, NULL, '$name', '$descr', '$unit', '$imageName')";
        echo $sql;
        $db->query($sql);

        file_put_contents("imgUploads/$imageName", $data); 
        return $productNr;
    }

    function insertInventoryEntry($db, $inventoryNr, $productNr, $userNr, $amount, $buyingDate, $expiringDate, $status) {
        
        // set values of varaibles
        $inventoryNr = $inventoryNr != '' ? $inventoryNr : null;
        $productNr = $productNr != '' ? $productNr : 5;
        $userNr = $userNr != '' ? $userNr : 1;
        $amount = $amount != '' ? $amount : null;
        $buyingDate = $buyingDate != '' ? "'$buyingDate'" : null;
        $expiringDate = $expiringDate != '' ? "'$expiringDate'" : null;
        $status = $status != '' ? $status : null;
        
        
        $sql = "INSERT INTO inventoryentry (InventoryEntryNr, InventoryNr, ProductNr, UserNr, Amount, BuyingDate, ExpiringDate, Status) 
                                VALUES (NULL, $inventoryNr, $productNr, $userNr, $amount, $buyingDate, $expiringDate, $status)"; 
        echo $sql;
        $db->query($sql);
    }

    if (isset($_POST['submit'])) {
        insertProduct($db, $name_product, $descr_product, $unit, $imageBase64);
        insertInventoryEntry($db, $inventory, null, null, $amount, $date_buying, $date_expiring, null);
//        redirect('inventory.php?inventory='.$inventory);
    }

//        $sql = "INSERT INTO files(mime,data) VALUES(:mime,:data)";
//        $stmt = $db->prepare($sql);
//
//        $stmt->bindParam(':mime', $mime);
//        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
//
//        return $stmt->execute();
//    }

//    if (trim($name_prod_gr) != '') {
//        
//        //works but we should not do it that way
//        $sql_prod_gr = "INSERT INTO productgroup (ProdgrNr, Name, Description, NameShort, IconName, IconExtension) VALUES (NULL, '$name_prod_gr', '$descr_prod_gr', NULL, NULL, NULL)";
//        $db->query($sql_prod_gr);   
//    }
//
//    if (trim($name_product) != '') {
//        // works as well, but we shoud not do it that way
//        $sql_product = "INSERT INTO product (ProdNr, ProdgrNr, Name, Description, Unit, ImageName, ImageExtension) VALUES (NULL, NULL, '$name_product', '$descr_product', '$unit', NULL, NULL)"
//        $db->query($sql_product); 
//    }
        // works as well, but we shoud not do it that way
        

//        redirect('inventory.php?inventory='.$inventory);


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
