<?php
    include('../common/connectDB.php');
    include('../common/basicFunctions.php');

    session_start();
    $db = connectToDB();


    // Variables of the inventory
    $name_inventory = $_GET['name_inventory'];
    $description_inventory = $_GET['description_inventory'];
    $inventory_nr = "";
    $user_nr = $_SESSION['user_nr'];
    $matrix_nr = null;


    // Get next autoincrement value that is returned by the function
    $sql = "SHOW TABLE STATUS WHERE name='inventory'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $inventory_nr = $row['Auto_increment'];
        }
    }

    // Insert of the new inventory with a prepare statement
    $sql = "INSERT INTO Inventory (InventoryNr, Name, Description) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('iss', $inventory_nr, $name_inventory, $description_inventory);
    $stmt->execute();

    // Insert of userInventoryEntry with a prepare statement
    $sql = "INSERT INTO InventoryUserMatrix (MatrixNr, InventoryNr, UserNr) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('iii', $matrix_nr, $name_inventory, $user_nr);
    $stmt->execute();

    redirect("inventory.php?inventory=$inventory_nr");
?>