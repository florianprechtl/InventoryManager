<?php
    include('../common/basicFunctions.php');
    include('../common/connectDB.php');
    session_start();

    print_r($_POST);

    if (isset($_POST['save_changes'])) {
        // update inventory entry

        $inventory_entry_nr = $_POST['inventory_entry_nr'];
        $amount = $_POST['amount'];
        $unit = $_POST['unit'];
        $expiring_date = $_POST['date_expiring'];
        $buying_date = $_POST['date_buying'];
        $inventory_nr = $_SESSION['inventory_nr'];


        $db = connectToDB();

        // Insert of the new inventory with a prepare statement
        $sql = "Update InventoryEntry Set Amount = ?, Unit = ?, ExpiringDate = ?, BuyingDate = ? Where InventoryEntryNr = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('isssi', $amount, $unit, $expiring_date, $buying_date, $inventory_entry_nr);
        $stmt->execute();
        redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=true");
    }
    if (isset($_POST['dismiss_changes'])) {
        redirect("inventory.php?inventory=$inventory_nr");
    }
?>