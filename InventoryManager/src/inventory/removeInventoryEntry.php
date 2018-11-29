<?php
    include('../common/connectDB.php');

    $db = connectToDB();
    $inventoryEntryNr = $_POST['nr'];

    $sql = "DELETE FROM InventoryEntry WHERE InventoryEntryNr = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $inventoryEntryNr);
    $stmt->excute();

    ################################
    ## delete img from ftp server ##
    ################################

    // does not necessarily make sense to remove pic from ftp server because we could use it again later
    $file = "imgUploads/$_POST[imgName]";
?>
