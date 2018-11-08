<?php
    include('basicFunctions.php');

    $name_inventory = $_GET['name_inventory'];
    $description_inventory = $_GET['description_inventory'];
    $search_entry = $_GET['search_entry'];
    $inventory= $_GET['inventory'];

    if (isset($_GET['search'])) {
        redirect("../inventory/inventory.php?inventory=$inventory&searchEntry=$search_entry");
    }
    if (isset($_GET['add_new_inventory'])) {
        redirect("../inventory/uploadInventory.php?name_inventory=$name_inventory&description_inventory=$description_inventory");
    }
?>