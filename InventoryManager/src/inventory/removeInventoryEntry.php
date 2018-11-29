<?php
    include('../common/connectDB.php');

    $db = connectToDB();

    // Validation and sanitization
    // Inventory entry nr
    if (isset($_POST['unit'])) {
        $inventoryEntryNr = filter_var($_POST['nr'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        return 0;
    }


    if (isset($_POST['imgName'])) {
        $imgName = filter_var($_POST['nr'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        return 0;
    }

    // Delete inventory entry from db
    $sql = "DELETE FROM InventoryEntry WHERE InventoryEntryNr = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $inventoryEntryNr);
    $stmt->excute();



    ################################
    ## delete img from ftp server ##
    ################################

    $file = "imgUploads/$imgName";
?>
