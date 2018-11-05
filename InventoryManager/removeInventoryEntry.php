<?php
    include('connectDB.php');

    $db = connectToDB();
    $inventoryEntryNr = $_POST['nr'];

    $sql = "DELETE FROM InventoryEntry WHERE InventoryEntryNr = $inventoryEntryNr";
    $db->query($sql);

    ################################
    ## delete img from ftp server ##
    ################################

    // does not necessarily make sense to remove pic from ftp server
    $file = "imgUploads/$_POST[imgName]";
?>