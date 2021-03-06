<?php
    include('../common/connectDB.php');

    $db = connectToDB();

    // Validation and sanitization
    // Inventory entry nr
    if (isset($_POST['nr'])) {
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
    $sql = "DELETE FROM InventoryEntry WHERE InventoryEntryNr = $inventoryEntryNr";
    $db->query($sql);



    ################################
    ## delete img from ftp server ##
    ################################

    // They should not be deleted, because we are only deleting the entry and not the whole product, which can be reused afterwards
    $file = "imgUploads/$imgName";
?>
