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
    

    function insertProduct($db, $name, $descr, $nameShort, $imageBase64) {
        
        $imageName = null;
        $data = null;
        echo "hier2";
        
        $sql = "INSERT INTO product (ProductNr, Name, Description, NameShort, Image) VALUES (NULL, '$name', '$descr', '$nameShort', '$imageName')";
        echo "hier3";
        $db->query($sql);

        echo "hier4";
        $imageName = time() . '.png';
        $data = base64_decode($imageBase64);
        file_put_contents("imgUploads/$imageName", $data);
        echo "hier4.5";
   
    }

    function insertInventoryEntry($db) {
        echo "hier6";
        $sql = "INSERT INTO inventoryentry (InventoryEntryNr, InventoryNr, ProductNr, UserNr, Amount, BuyingDate, ExpiringDate, Status) 
                                VALUES (NULL, '$inventory', '5', '1', '$amount', '$date_buying', '$date_expiring', NULL)"; 
        echo "hier7";
        $db->query($sql);
        echo "hier8";
        echo "hier9";
    }

    if (isset($_POST['submit'])) {
        echo "hier1";
        insertProduct($db, $name_product, $descr_product, null, $imageBase64);
        echo "hier5";
        insertInventoryEntry($db);
        echo "hier10";
        redirect('inventory.php?inventory='.$inventory);
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
        

        redirect('inventory.php?inventory='.$inventory);


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
