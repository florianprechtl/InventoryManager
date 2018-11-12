<?php
    include('../common/basicFunctions.php');
    include('../common/connectDB.php');
    session_start();

    $date_pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])'; // yyyy-mm-dd

    if (isset($_POST['save_changes'])) {
        // update inventory entry

        // validate and sanitize inputs
        if (isset($_POST['inventory_entry_nr'])) {
            $inventory_entry_nr = filter_var($_POST['inventory_entry_nr'], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $inventory_entry_nr = null;
            redirect("inventory.php?inventory=$inventory_nr&successfullUpdate=false1");
        }

        if (isset($_POST['amount'])) {
            $amount = filter_var($_POST['amount'], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $amount = null;
            redirect("inventory.php?inventory=$inventory_nr&successfullUpdate=false2");
        }

        if (isset($_POST['unit']) && strlen($_POST['unit']) <= 10) {
            $unit = filter_var($_POST['unit'], FILTER_SANITIZE_NUMBER_STRING);
        } else {
            $unit = null;
            redirect("inventory.php?inventory=$inventory_nr&successfullUpdate=false3");
        }

        if (isset($_POST['date_buying']) && strlen($_POST['date_buying']) == 10){
            $date_buying = filter_var($_POST['date_buying'], FILTER_SANITIZE_NUMBER_STRING);
        } else {
            $date_buying = null;
            redirect("inventory.php?inventory=$inventory_nr&successfullUpdate=false4");
        }

        if (isset($_POST['date_expiring']) && strlen($_POST['date_expiring']) == 10) {
            $date_expiring = filter_var($_POST['date_expiring'], FILTER_SANITIZE_NUMBER_STRING);
        } else {
            $date_expiring = null;
            redirect("inventory.php?inventory=$inventory_nr&successfullUpdate=false5");
        }


        $inventory_nr = $_SESSION['inventory_nr'];
        $db = connectToDB();

        // Insert of the new inventory with a prepare statement
        $sql = "Update InventoryEntry Set Amount = ?, Unit = ?, ExpiringDate = ?, BuyingDate = ? Where InventoryEntryNr = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('isssi', $amount, $unit, $date_expiring, $date_buying, $inventory_entry_nr);
        $stmt->execute();
        redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=true");
    }
    if (isset($_POST['dismiss_changes'])) {
        redirect("inventory.php?inventory=$inventory_nr");
    }
?>