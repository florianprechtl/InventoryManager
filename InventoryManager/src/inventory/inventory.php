<html>

<?php
    include('../common/basicFunctions.php');
    includeWithVariables('../common/connectDB.php', array());
    include('../common/header_session_start.php');

    if (!isset($_SESSION['user_nr'])) {
        redirect('../login/login.php?goBackDenied=true');
    }
?>

<body>
    <div class="container-fluid" style="max-width: 800px; width:100%">

        <!-- Header -->
        <div class="row header">
            <h1 class="col-sm-12 no-margin-bottom" align="center">
                Inventory Manager
                <a class="btn btn-sm btn-light margin-bottom margin-top margin-left float-right" href="../logout/logout.php">Logout</a>
                <p class="float-right header-user-show">signed in as <?php echo $_SESSION['user_name']?></p>
            </h1>
        </div>

        <!-- Search bar and Inventory select -->
        <form method="GET" action="inventory.php" enctype="multipart/form-data">
            <div class="row justify-content-between margin-top">
                <!-- Left side - inventory select -->
                <div class="col-sm-5">
                    <div class="form-group">

                        <label for="inventorySelect"">Select Inventory:</label>
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
                                    }
                                }
                            ?>
                        </select>

                    </div>
                </div>

                <!-- Right side - search bar -->
                <div class="col-sm-5">
                    <label for="searchEntry">Search for specific entries:</label>
                    <div class="input-group" id="adv-search">
                        <input type="text" class="form-control" name="searchEntry" id="searchEntry" placeholder="Search for ..." />
                        <div class="input-group-btn">
                            <div class="btn-group search-button" role="group">
<!--                                <div class="dropdown dropdown-lg search-assesories">-->
<!--                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>-->
<!--                                    <div class="dropdown-menu dropdown-menu-right" role="menu">-->
<!--                                        <form class="form-horizontal" role="form">-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="contain">Product name</label>-->
<!--                                                <input class="form-control" type="text" />-->
<!--                                            </div>-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="contain">Contains the words</label>-->
<!--                                                <input class="form-control" type="text" />-->
<!--                                            </div>-->
<!--                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>-->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <button type="submit" class="btn button-search search-assesories"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Inventory entries showcase -->
        <div class="d-flex justify-content-around flex-wrap bd-highlight mb-3">
            <div class="inventory-item-preview icon-box" data-toggle="modal" data-target="#myModal">
                <a><i class="fas fa-plus add-entry-icon"></i></a>
            </div>
            <!-- Modal -->
            <!-- That's where the included addInventoryEntry modal gets included afterwards -->
            <?php
                if (isset($_SESSION['inventory_nr'])) {
                    includeWithVariables('addInventoryEntry_Modal.php', array('inventory' => $_SESSION['inventory_nr']));
                }
            ?>

            <?php
                $db = connectToDB();
        
                if (isset($_SESSION['inventory_nr'])) {
                    if (isset($_GET['searchEntry'])) {
                        $sql = "SELECT * FROM inventoryentry inner join product on inventoryentry.ProductNr = product.ProdNr where InventoryNr = $_SESSION[inventory_nr] and Name like '%$_GET[searchEntry]%'";
                    } else {
                        $sql = "SELECT * FROM inventoryentry inner join product on inventoryentry.ProductNr = product.ProdNr where InventoryNr = $_SESSION[inventory_nr]";

                    }
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $img = file_get_contents("../../imgUploads/$row[Image]");

                            echo "<div class='inventory-item-preview' data-toggle='modal' data-target='#exampleModal' id='inventory_item_preview_$row[InventoryEntryNr]' style=background-image:url(../../imgUploads/" . $row['Image'] . ");>";
                            echo "<i class='btn btn-danger button-remove' id='button_remove_$row[InventoryEntryNr]_$row[Image]'>X</i>";
                            echo "$row[Name]<br><br>$row[InventoryEntryNr]</div>";

                            includeWithVariables('infoproduct.php', array('inventoryEntry' => $row['InventoryEntryNr']));
                        }
                    }
                } else {
                    echo "  <div class='alert alert-danger' role='alert'>
                                No entries!
                            </div>";
                }
            ?>
        </div>
    </div>

</body>

</html>
