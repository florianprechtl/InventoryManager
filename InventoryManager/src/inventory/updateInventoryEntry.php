<?php
    include('../common/basicFunctions.php');
    include('../common/connectDB.php');

    print_r($_POST);

    if (isset($_POST['save_changes'])) {
        // update inventory entry

        $inventory_nr = $_POST['inventory_entry_nr'];
        $amount = $_POST['amount'];


        $db = connectToDB();

        // Insert of the new inventory with a prepare statement
        $sql = "Update InventoryEntry Set Amount = ? Where InventoryEntryNr = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('ii', $amount, $inventory_nr);
        $stmt->execute();
        redirect('inventory.php?updateSuccessful=true');
    }
    if (isset($_POST['dismiss_changes'])) {
        redirect('inventory.php');
    }
?>