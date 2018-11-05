<?php
    include('connectDB.php');
    include('basicFunctions.php');

    $db = connectToDB();

    // variables of the product
    $name_product = $_POST['name_prod_new'];
    $descr_product = $_POST['descr_prod_new'];
    $unit = $_POST['unit'];
    $imageBase64 = $_POST['imageBase64'];

    //variables of the inventor entry
    $amount = $_POST['amount'];
    $date_buying = convertDate($_POST['date_buying']);
    $date_expiring = convertDate($_POST['date_expiring']);
    $inventory = $_GET['inventory'];

    if (isset($_POST['submit'])) {
        $productNr = null;

        if (!isset($_POST['name_prod_existing'])) {
            $productNr = insertProduct($db, $name_product, $descr_product, $unit, $imageBase64);
        } else {
            $productNr = $_POST['name_prod_existing'];
        }
        insertInventoryEntry($db, $inventory, $productNr, null, $amount, $date_buying, $date_expiring, null);
        redirect('inventory.php?inventory='.$inventory);
    }
    
    

    /*
    * function that inserts product and returns the prodNr of the inserted product
    */
    function insertProduct($db, $name, $descr, $unit, $imageBase64) {
        
        // set values of varaibles
        $name = $name != '' ? $name : null;
        $descr = $descr != '' ? $descr : null;
        $unit = $unit != '' ? $unit : null;
        $imageName = null;
        $data = null;
        $imageName = time() . '.png';
        $data = base64_decode($imageBase64);
        
        $productNr = null;
        
        // get next autoincrement value that is returned by the function
        $sql = "SHOW TABLE STATUS WHERE name='product'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productNr = $row['Auto_increment'];
            }
        }
        
        // insert product 
        $sql = "INSERT INTO product (ProdNr, ProdgrNr, Name, Description, Unit, Image) VALUES (NULL, NULL, '$name', '$descr', '$unit', '$imageName')";
        echo $sql;
        $db->query($sql);

        // upload image to the "imgUploads" folder
        file_put_contents("imgUploads/$imageName", $data); 
        return $productNr;
    }


    /*
    *   Function that inserts inventoryentry
    */
    function insertInventoryEntry($db, $inventoryNr, $productNr, $userNr, $amount, $buyingDate, $expiringDate, $status) {
        
        // set values of variables
        $inventoryNr = $inventoryNr != '' ? $inventoryNr : 'null';
        $productNr = $productNr != '' ? $productNr : 5;
        $userNr = $userNr != '' ? $userNr : 1;
        $amount = $amount != '' ? $amount : 'null';
        $buyingDate = $buyingDate != '' ? "'$buyingDate'" : 'null';
        $expiringDate = $expiringDate != '' ? "'$expiringDate'" : 'null';
        $status = $status != '' ? $status : 'null';
        
        // insert inventor entry
        $sql = "INSERT INTO inventoryentry (InventoryEntryNr, InventoryNr, ProductNr, UserNr, Amount, BuyingDate, ExpiringDate, Status) 
                                VALUES (NULL, $inventoryNr, $productNr, $userNr, $amount, $buyingDate, $expiringDate, $status)"; 
        echo $sql;
        $db->query($sql);
    }
?>
