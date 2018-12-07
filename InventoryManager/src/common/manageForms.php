<!-- Is used to manage two competing forms
This file decides which php file to redirect to -->
<?php

    include('basicFunctions.php');

    // Validation and sanitization
    // Inventory nr
    if (isset($_GET['add_new_inventory']) && isset($_GET['inventory'])) {
        $inventory_nr =  filter_var($_GET['inventory'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        $inventory_nr = null;
    }

    // Name
    if (isset($_GET['add_new_inventory']) && isset($_GET['name_inventory'])) {
        $name_inventory =  filter_var($_GET['name_inventory'], FILTER_SANITIZE_STRING);
    } else {
        $name_inventory = null;
        redirect("inventory.php?inventory=$inventory_nr&error=errorNotDefined");
    }

    // Description
    if (isset($_GET['add_new_inventory']) && isset($_GET['description_inventory'])) {
        $description_inventory =  filter_var($_GET['description_inventory'], FILTER_SANITIZE_STRING);
    } else {
        $description_inventory = null;
    }

    // Search entry
    if (isset($_GET['search']) && isset($_GET['search_entry'])) {
        $search_entry =  filter_var($_GET['search_entry'], FILTER_SANITIZE_STRING);
    } else {
        $search_entry = null;
    }





    // manage which submit button was clicked
    if (isset($_GET['search'])) {
        redirect("../inventory/inventory.php?inventory=$inventory_nr&search_entry=$search_entry");
    } else if (isset($_GET['add_new_inventory'])) {
        redirect("../inventory/uploadInventory.php?inventory=$inventory_nr&name_inventory=$name_inventory&description_inventory=$description_inventory");
    }
?>