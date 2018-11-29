<?php
    include('../common/connectDB.php');

    $db = connectToDB();

    // Validation and sanitization
    // Inventory entry nr
    if (isset($_POST['nr'])) {
        $inventoryEntryNr = filter_var($_POST['nr'], FILTER_SANITIZE_NUMBER_INT);
    } else {
    }


    if (isset($_POST['imgName'])) {
        $imgName = filter_var($_POST['nr'], FILTER_SANITIZE_NUMBER_INT);
    } else {
    }

    // Delete inventory entry from db
    $sql = "DELETE FROM InventoryEntry WHERE inventoryEntryNr = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $inventoryEntryNr);
    $stmt->excute();
//    $sql = "DELETE FROM InventoryEntry WHERE InventoryEntryNr = $inventoryEntryNr";
//    $db->query($sql);



    ################################
    ## delete img from ftp server ##
    ################################

    $file = "imgUploads/$imgName";
?>
