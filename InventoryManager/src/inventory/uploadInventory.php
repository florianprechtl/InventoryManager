<?php
    include('../common/connectDB.php');
    include('../common/basicFunctions.php');

    $db = connectToDB();

    // Variables of the inventory
    $inventory_name = $_GET['inventory_name'];
    $description_inventory = $_GET['description_inventory'];
    $inventoryNr="";

    // Get next autoincrement value that is returned by the function
    $sql = "SHOW TABLE STATUS WHERE name='inventory'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $inventoryNr = $row['Auto_increment'];
        }
    }

    // Insert of the new inventory
    $sql = "INSERT INTO Inventory (InventoryNr, Name, Description) VALUES (NULL, '$inventory_name', '$description_inventory')";

    $db->query($sql);

    redirect("inventory.php?inventory=$inventoryNr");
?>