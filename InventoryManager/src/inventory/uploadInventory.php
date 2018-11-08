<?php
    include('../common/connectDB.php');
    include('../common/basicFunctions.php');

    session_start();

    $db = connectToDB();

    // Variables of the inventory
    $name_inventory = $_GET['name_inventory'];
    $description_inventory = $_GET['description_inventory'];
    $inventory_nr="";

    // Get next autoincrement value that is returned by the function
    $sql = "SHOW TABLE STATUS WHERE name='inventory'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $inventory_nr = $row['Auto_increment'];
        }
    }

    // Insert of the new inventory
    $sql = "INSERT INTO Inventory (InventoryNr, Name, Description) VALUES (NULL, '$name_inventory', '$description_inventory')";
    $db->query($sql);

    // Insert of userInventoryEntry
    $sql = "INSERT INTO InventoryUserMatrix (MatrixNr, InventoryNr, UserNr) VALUES (NULL, $inventory_nr, $_SESSION[user_nr])";
    $db->query($sql);

    redirect("inventory.php?inventory=$inventory_nr");
?>