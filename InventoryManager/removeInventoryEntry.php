<?php
    include('connectDB.php');

    $db = connectToDB();
    $inventoryEntryNr = $_POST['nr'];

    $sql = "DELETE FROM InventoryEntry WHERE InventoryEntryNr = $inventoryEntryNr";
    $db->query($sql);

    redirect($_SERVER['HTTP_REFERER']);
?>