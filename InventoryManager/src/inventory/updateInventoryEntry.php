<?php
    include('../common/basicFunctions.php');
    include('../common/connectDB.php');
    session_start();

    // Pattern that could be useful in the future
    $date_pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])'; // yyyy-mm-dd

    // Just to be sure
    if (isset($_SESSION['inventory_nr'])) {
        $inventory_nr = filter_var($_SESSION['inventory_nr'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        $inventory_nr = null;
        redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=false");
    }

    // Database connection
    $db = connectToDB();

    // Save updated inventory entry
    if (isset($_POST['save_changes'])) {
        // validate and sanitize inputs
        // Inventory entry nr
        if (isset($_POST['inventory_entry_nr'])) {
            $inventory_entry_nr = filter_var($_POST['inventory_entry_nr'], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $inventory_entry_nr = null;
            redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=false");
        }

        // Amount
        if (isset($_POST['amount'])) {
            $amount = filter_var($_POST['amount'], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $amount = null;
            redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=false");
        }

        // Unit
        if (isset($_POST['unit']) && strlen($_POST['unit']) <= 10) {
            $unit = filter_var($_POST['unit'], FILTER_SANITIZE_STRING);
        } else {
            $unit = null;
            redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=false");
        }

        // Buying Date
        if (isset($_POST['date_buying']) && strlen($_POST['date_buying']) == 10){
            $date_buying = filter_var($_POST['date_buying'], FILTER_SANITIZE_STRING);
        } else {
            if (!empty($_POST['date_buying'])) {
                redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=false");
            } else {
                $date_buying = null;
            }
        }

        // Expiring Date
        if (isset($_POST['date_expiring']) && strlen($_POST['date_expiring']) == 10) {
            $date_expiring = filter_var($_POST['date_expiring'], FILTER_SANITIZE_STRING);
        } else {
            if (!empty($_POST['date_expiring'])) {
                redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=false");
            } else {
                $date_expiring = null;
            }
        }



        // Insert of the new inventory with a prepare statement
        $sql = "Update InventoryEntry Set Amount = ?, Unit = ?, ExpiringDate = ?, BuyingDate = ? Where InventoryEntryNr = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('isssi', $amount, $unit, $date_expiring, $date_buying, $inventory_entry_nr);
        $stmt->execute();
        redirect("inventory.php?inventory=$inventory_nr&updateSuccessful=true");
    }

    // Dismiss changes and go back to inventory view
    if (isset($_POST['dismiss_changes'])) {
        // changes are dismissed -> redirect to previous inventory without any changes
        // -> but if someone else changed something, the user can see the changes
        redirect("inventory.php?inventory=$inventory_nr");
    }
?>