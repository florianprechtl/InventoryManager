<?php
    include('../common/connectDB.php');
    include('../common/basicFunctions.php');

    $db = connectToDB();

    // Validate and sanitize inputs
    // Inventory nr
    if (isset($_GET['inventory'])) {
        $inventory_nr =  filter_var($_GET['inventory'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        $inventory_nr = null;
    }

    // Product name
    if (isset($_POST['name_prod_new'])) {
        if(strlen($_GET['name_inventory']) <= 30) {
            $name_product =  filter_var($_POST['name_prod_new'], FILTER_SANITIZE_STRING);
        } else {
            redirect("inventory.php?inventory=$inventory_nr&error=productNameToLong");
        }
    } else {
        $name_product = null;
        redirect("inventory.php?inventory=$inventory_nr&error=productNameNotDefined");
    }

    // variables of the product
    $descr_product = $_POST['descr_prod_new'];
    $imageBase64 = $_POST['imageBase64'];

    //variables of the inventor entry
    $amount = $_POST['amount'];
    $unit = $_POST['unit'];
    $date_buying = $_POST['date_buying'];
    $date_expiring = $_POST['date_expiring'];

    if (isset($_POST['submit'])) {
        $productNr = null;

        if (!isset($_POST['name_prod_existing']) || $_POST['name_prod_existing'] == '') {
            $productNr = insertProduct($db, $name_product, $descr_product, $descr_product, $imageBase64);
        } else {
            $productNr = $_POST['name_prod_existing'];
        }
        insertInventoryEntry($db, $inventory, $productNr, null, $amount, $unit, $date_buying, $date_expiring, null);
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
        $sql = "INSERT INTO product (ProdNr, ProdgrNr, Name, Description, Image) VALUES (NULL, NULL, '$name', '$descr', '$imageName')";
        echo $sql;
        $db->query($sql);

        // upload image to the "imgUploads" folder
        file_put_contents("../../imgUploads/$imageName", $data);
        return $productNr;
    }


    /*
    *   Function that inserts inventoryentry
    */
    function insertInventoryEntry($db, $inventoryNr, $productNr, $userNr, $amount, $unit, $buyingDate, $expiringDate, $status) {
        
        // set values of variables
        $inventoryNr = $inventoryNr != '' ? $inventoryNr : 'null';
        $productNr = $productNr != '' ? $productNr : 5;
        $userNr = $userNr != '' ? $userNr : 1;
        $amount = $amount != '' ? $amount : 'null';
        $unit = $unit != '' ? "'$unit'" : 'null';
        $buyingDate = $buyingDate != '' ? "'$buyingDate'" : 'null';
        $expiringDate = $expiringDate != '' ? "'$expiringDate'" : 'null';
        $status = $status != '' ? $status : 'null';
        
        // insert inventor entry
        $sql = "INSERT INTO inventoryentry (InventoryEntryNr, InventoryNr, ProductNr, UserNr, Amount, Unit, BuyingDate, ExpiringDate, Status) 
                                VALUES (NULL, $inventoryNr, $productNr, $userNr, $amount, $unit, $buyingDate, $expiringDate, $status)";
        echo $sql;
        $db->query($sql);
    }
?>
