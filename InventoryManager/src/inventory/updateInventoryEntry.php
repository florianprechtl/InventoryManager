<?php
    include('../common/basicFunctions.php');
    include('../common/connectDB.php');

    print_r($_POST);

    if (isset($_POST['save_changes'])) {
        // update inventory entry

        $inventory_nr = $_POST['inventory_entry'];

        var_dump($inventory_nr);


        $db = connectToDB();

//        // Insert of the new inventory with a prepare statement
//        $sql = "INSERT INTO Inventory (InventoryNr, Name, Description) VALUES (?, ?, ?)";
//        $stmt = $db->prepare($sql);
//        $stmt->bind_param('iss', $inventory_nr, $name_inventory, $description_inventory);
//        $stmt->execute();
//
//        // Insert of userInventoryEntry with a prepare statement
//        $sql = "INSERT INTO InventoryUserMatrix (MatrixNr, InventoryNr, UserNr) VALUES (?, ?, ?)";
//        $stmt = $db->prepare($sql);
//        $stmt->bind_param('iii', $matrix_nr, $inventory_nr, $user_nr);
//        $stmt->execute();
    }
    if (isset($_POST['dismiss_changes'])) {
        redirect('inventory.php');
    }
?>