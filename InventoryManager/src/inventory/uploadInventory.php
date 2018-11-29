<?php
    include('../common/connectDB.php');
    include('../common/basicFunctions.php');

    session_start();
    $db = connectToDB();


    // validate and sanitize inputs
    if (isset($_GET['name_inventory']) && !empty($_GET['name_inventory'])) {
        $name_inventory =  filter_var($_GET['name_inventory'], FILTER_SANITIZE_STRING);
    } else {
        $name_inventory = null;
        redirect("inventory.php?inventory=$inventory_nr&error=nameNotDefined");
    }

    if (isset($_GET['description_inventory'])) {
        $description_inventory =  filter_var($_GET['description_inventory'], FILTER_SANITIZE_STRING);
    } else {
        $description_inventory = null;
    }

    if (isset($_SESSION['user_nr'])) {
        $user_nr =  filter_var($_SESSION['user_nr'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        $user_nr = null;
        redirect("inventory.php?inventory=$inventory_nr&error=userNotDefined");
    }

    if (isset($_GET['inventory'])) {
        $inventory_nr =  filter_var($_GET['inventory'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        $inventory_nr = null;
    }

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
    $stmt->bind_param('iii', $matrix_nr, $inventory_nr, $user_nr);
    $stmt->execute();

    redirect("inventory.php?inventory=$inventory_nr");
?>