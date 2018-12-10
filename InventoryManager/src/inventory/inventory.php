<html>

<?php
    include('../common/basicFunctions.php');
    includeWithVariables('../common/connectDB.php', array());
    include('inventory_header_session_start.php');
    include('../common/product.php');

    if (!isset($_SESSION['user_nr'])) {
        redirect('../login/login.php?goBackDenied=true');
    }
?>

<body>
    <div class="container-fluid" style="max-width: 800px; width: 100%; min-height: 100%; background-color: rgba(256, 256, 256, .7)">

        <!-- Header -->
        <div class="row header">
            <h1 class="col-sm-12 no-margin-bottom" align="center">
                MyFridge
                <a class="btn btn-sm btn-light margin-bottom margin-top margin-left float-right" href="../logout/logout.php">Logout</a>
                <p class="float-right header-user-show">signed in as <?php echo $_SESSION['user_name']?></p>
            </h1>
        </div>

        <!-- Search bar and Inventory select -->
        <form method="GET" action="../common/manageForms.php" enctype="multipart/form-data">
            <div class="row justify-content-between margin-top">
                <!-- Left side - inventory select -->
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="inventorySelect"">Select Inventory:</label>


                        <div class="input-group" id="adv-search">

                            <select class="form-control" name="inventory" id="inventorySelect">
                                <?php
                                    $db = connectToDB();

                                    $sql = "SELECT * FROM Inventory join Inventoryusermatrix on Inventory.InventoryNr = Inventoryusermatrix.InventoryNr WHERE UserNr = $_SESSION[user_nr]";
                                    $result = $db->query($sql);

                                    $_SESSION['inventory_nr'] = null;

                                    if (isset($_GET["inventory"])) {
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                if ($_GET['inventory'] == $row['InventoryNr']) {
                                                    echo "<option value='$row[InventoryNr]'  selected>$row[Name]</option>";
                                                    $_SESSION['inventory_nr'] = $_GET['inventory'];
                                                } else {
                                                    echo "<option value='$row[InventoryNr]'>$row[Name]</option>";

                                                    // first option gets selected
                                                    if (!isset($_SESSION['inventory_nr'])) {
                                                        $_SESSION['inventory_nr'] = $row['InventoryNr'];
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value='$row[InventoryNr]'>$row[Name]</option>";

                                                // first option gets selected
                                                if (!isset($_SESSION['inventory_nr'])) {
                                                    $_SESSION['inventory_nr'] = $row['InventoryNr'];
                                                }
                                            }
                                        } else {
                                            $_SESSION['inventory_nr'] = "none";
                                        }
                                    }
                                ?>
                            </select>

                            <div class="input-group-btn">
                                <div class="btn-group search-button" role="group">
                                    <button type="button" class="btn button-search" data-toggle='modal' data-target='#add_inventory_modal'><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        include('addInventory_Modal.php');
                    ?>
                </div>

                <!-- Right side - search bar -->
                <div class="col-sm-5">
                    <label for="search_entry">Search for specific entries:</label>
                    <div class="input-group" id="adv-search">
                        <input type="text" class="form-control" name="search_entry" id="search_entry" placeholder="Search for ..." />
                        <div class="input-group-btn">
                            <div class="btn-group search-button" role="group">
                                <button type="submit" name="search" id="search_button" class="btn button-search" value="search"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Alerts -->
        <div class="row justify-content-center padding-right padding-left padding-top">
            <?php
            if (isset($_GET['updateSuccessful'])) {
                if ($_GET['updateSuccessful'] == 'true') {
                    echo "  <div class='col-sm-9 alert alert-info' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <strong>Successfully changed inventory entry!</strong>
                            </div>";
                } else if ($_GET['updateSuccessful'] == 'false') {
                    echo "  <div class='col-sm-9 alert alert-danger' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <strong>Updating the entry did not work! </strong>Please try again or give up!
                            </div>";
                }
            }

            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'nameNotDefined') {
                    echo "  <div class='col-sm-9 alert alert-danger' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <strong>Adding inventory did not work! </strong>No name defined
                            </div>";
                }
            }

            if ($_SESSION['inventory_nr'] == "none") {
                echo "  <div class='col-sm-9 alert alert-danger' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <strong>There is no inventory yet! </strong>Add your first inventory by clicking on the plus button next to the select field.
                            </div>";
            }


            ?>
        </div>

        <!-- Inventory entries showcase -->
        <div class="d-flex justify-content-around flex-wrap bd-highlight mb-3">
            <div class="inventory-item-preview icon-box add-inventory-entry-button" data-toggle="modal" data-target="#myModal">
                <a><i class="fas fa-plus add-entry-icon"></i></a>
            </div>
            <!-- Modal -->
            <!-- That's where the included addInventoryEntry modal gets included afterwards -->
            <?php
                if (isset($_SESSION['inventory_nr'])) {
                    includeWithVariables('addInventoryEntry_Modal.php', array('inventory' => $_SESSION['inventory_nr']));
                }
            ?>

            <!-- Adding Entry panels plus their specific modal -->
            <!-- If there is nothing to show, there will be a warning for the user -->
            <?php
                $db = connectToDB();
        
                if (isset($_SESSION['inventory_nr'])) {
                    if (isset($_GET['search_entry'])) {
                        $sql = "SELECT * FROM inventoryentry inner join product on inventoryentry.ProductNr = product.ProdNr where InventoryNr = $_SESSION[inventory_nr] and Name like '%$_GET[search_entry]%'";
                    } else {
                        $sql = "SELECT * FROM inventoryentry inner join product on inventoryentry.ProductNr = product.ProdNr where InventoryNr = $_SESSION[inventory_nr]";

                    }
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $img = file_get_contents("../../imgUploads/$row[Image]");

                            echo "<div class='inventory-item-preview' data-toggle='modal' data-target='#info_modal_$row[InventoryEntryNr]' id='inventory_item_preview_$row[InventoryEntryNr]' style=background-image:url(../../imgUploads/" . $row['Image'] . ");>";
                            echo "<i class='btn btn-danger button-remove' id='button_remove_$row[InventoryEntryNr]_$row[Image]'>X</i>";
                            echo "$row[Name]</div>";

                            includeWithVariables('infoInventoryEntry_Modal.php', array('inventoryEntryNr' => $row['InventoryEntryNr']));
                        }
                    } else if (isset($_GET['search_entry']) && empty($_GET['search_entry'])) {
                        echo "<div class='inventory-item-preview alert alert-danger'>";
                        echo "<strong>No entries yet!</strong><br><br>Add one by clicking on the plus panel on the left!</div>";
                    } else {
                        echo "<div class='inventory-item-preview alert alert-danger'>";
                        echo "<strong>No results found!</strong><br><br>Keyword $_GET[search_entry] does not lead to any item in the inventory!</div>";
                    }
                }
            ?>
        </div>
    </div>

</body>

</html>
