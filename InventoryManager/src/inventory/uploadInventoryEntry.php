<?php
    include('../common/connectDB.php');
    include('../common/basicFunctions.php');
    session_start();

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
        if(strlen($_POST['name_prod_new']) <= 30) {
            $name_product =  filter_var($_POST['name_prod_new'], FILTER_SANITIZE_STRING);
        } else {
            redirect("inventory.php?inventory=$inventory_nr&error=productNameToLong");
        }
    } else {
        $name_product = null;
        redirect("inventory.php?inventory=$inventory_nr&error=productNameNotDefined");
    }

    // Product description
    if (isset($_POST['descr_prod_new'])) {
        if(strlen($_POST['descr_prod_new']) <= 1000) {
            $descr_product =  filter_var($_POST['descr_prod_new'], FILTER_SANITIZE_STRING);
        } else {
            redirect("inventory.php?inventory=$inventory_nr&error=productDescriptionToLong");
        }
    } else {
        $descr_product = null;
    }

    // Base64 Image
    if (isset($_POST['imageBase64'])) {
        if(strlen($_POST['imageBase64']) <= 100000000) {
            $imageBase64 = filter_var($_POST['imageBase64'], FILTER_SANITIZE_STRING);
        } else {
            redirect("inventory.php?inventory=$inventory_nr&error=base64ImageToBig");
        }
    } else {
        $imageBase64 = null;
    }

    // Amount
    if (isset($_POST['amount'])) {
        $amount =  filter_var($_POST['amount'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        $amount = null;
    }


    // Unit
    if (isset($_POST['unit']) && strlen($_POST['date_buying']) <= 10){
        $unit = filter_var($_POST['unit'], FILTER_SANITIZE_STRING);
    } else {
        $unit = null;
    }

    // Date buying
    if (isset($_POST['date_buying']) && strlen($_POST['date_buying']) == 10){
        $date_buying = filter_var($_POST['date_buying'], FILTER_SANITIZE_STRING);
    } else {
        $date_buying = null;
    }

    // Date expiring
    if (isset($_POST['date_expiring']) && strlen($_POST['date_expiring']) == 10) {
        $date_expiring = filter_var($_POST['date_expiring'], FILTER_SANITIZE_STRING);
    } else {
        $date_expiring = null;
    }

    // User nr
    if (isset($_SESSION['user_nr'])) {
        $user_nr = filter_var($_SESSION['user_nr'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        redirect("inventory.php?inventory=$inventory_nr&error=noUserDefined");
    }






    if (isset($_POST['submit'])) {
        $productNr = null;

        if (!isset($_POST['name_prod_existing']) || $_POST['name_prod_existing'] == '') {
            $productNr = insertProduct($db, $name_product, $descr_product, $imageBase64);
        } else {
            // name of the product is atm the value of the select option, which is the productNr
            $productNr = $_POST['name_prod_existing'];
        }
        insertInventoryEntry($db, $inventory_nr, $productNr, $user_nr, $amount, $unit, $date_buying, $date_expiring, null);
        // redirect('inventory.php?inventory='.$inventory_nr);
    }
    
    

    /*
    * function that inserts product and returns the prodNr of the inserted product
    */
    function insertProduct($db, $name, $descr, $imageBase64) {
        
        // Set values of variables
        $productNr = null;
        $prodgrNr = null;
        $name = $name != '' ? $name : null;
        $descr = $descr != '' ? $descr : null;
        $imageName = time() . '.png';

        // Decoding base64 image
        $data = base64_decode($imageBase64);
        
        // Get next autoincrement value that is returned by the function
        $sql = "SHOW TABLE STATUS WHERE name='product'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productNr = $row['Auto_increment'];
            }
        }
        
        // Insert product
        $sql = "INSERT INTO Product (ProdNr, ProdgrNr, Name, Description, Image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('iisss', $productNr, $prodgrNr, $name, $descr, $imageName);
        $stmt->execute();

        // Upload image to the "imgUploads" folder
        file_put_contents("../../imgUploads/$imageName", $data);
        return $productNr;
    }


    /*
    *   Function that inserts inventory entry
    */
    function insertInventoryEntry($db, $inventoryNr, $productNr, $userNr, $amount, $unit, $buyingDate, $expiringDate, $status) {
        
        // Set values of variables
        $inventoryEntryNr = null;
        
        // Insert inventor entry
        $sql = "INSERT INTO Inventoryentry (InventoryEntryNr, InventoryNr, ProductNr, UserNr, Amount, Unit, BuyingDate, ExpiringDate, Status)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $db->prepare($sql);

        print_r($stmt);

        $stmt->bind_param('iiiiisssi', $inventoryEntryNr, $inventoryNr, $productNr, $userNr, $amount, $unit, $buyingDate, $expiringDate, $status);

        print_r($stmt);

        $stmt->execute();

        print_r($stmt);

        $stmt->debugDumpParams();


    }
?>
