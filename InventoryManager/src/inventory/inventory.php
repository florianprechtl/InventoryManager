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

        <!--Header-->
        <div class="row header">
            <h1 class="col-sm-12 no-margin-bottom" align="center">
                Inventory Manager
                <a class="btn btn-sm btn-light margin-bottom margin-top margin-left float-right" href="../logout/logout.php">Logout</a>
                <p class="float-right header-user-show">signed in as <?php echo $_SESSION['user_name']?></p>
            </h1>
        </div>

        <!--Search bar and Inventory select-->
        <form method="GET" action="inventory.php" enctype="multipart/form-data">
            <div class="row justify-content-between margin-top">
                <!-- Left side - inventory select -->
                <div class="col-sm-5">
                    <div class="form-group">

                        <label for="exampleFormControlSelect1">Select Inventory:</label>
                        <select class="form-control" name="inventory" id="exampleFormControlSelect1">
                            <?php
                            $db = connectToDB();

                            $sql = "SELECT * FROM Inventory join Inventroyusermatrix on inventory.InventoryNr = Inventroyusermatrix.InventroyNr WHERE UserNr = $_SESSION[user_nr]";
                            $result = $db->query($sql);

                            if (isset($_GET["inventory"])) {
                                echo "<option value=''  selected>oben</option>";
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
                                echo "<option value=''  selected>unten</option>";
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

                            if (!isset($_GET['inventory'])) {
                                // has to be another default value afterwards, when we have user specific inventories
                                $inventory = 1;
                            }
                            ?>
                        </select>

                    </div>
                </div>

                <!-- Right side - search bar -->
                <div class="col-sm-5">
                    <label for="exampleFormControlSelect1">Search for specific entries:</label>
                    <div class="input-group" id="adv-search">

                        <input type="text" class="form-control" placeholder="Search for snippets" />
                        <div class="input-group-btn">
                            <div class="btn-group" role="group">
                                <div class="dropdown dropdown-lg search-assesories">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="contain">Author</label>
                                                <input class="form-control" type="text" />
                                            </div>
                                            <div class="form-group">
                                                <label for="contain">Contains the words</label>
                                                <input class="form-control" type="text" />
                                            </div>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
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
                    $sql = "SELECT * FROM inventoryentry inner join product on inventoryentry.ProductNr = product.ProdNr where InventoryNr = $_SESSION[inventory_nr]";

                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $img = file_get_contents("../../imgUploads/$row[Image]");

                            echo "<div class='inventory-item-preview' style=background-image:url(../../imgUploads/" . $row['Image'] . ");>";
                            echo "<i class='btn btn-danger button-remove' id='button_remove_$row[InventoryEntryNr]_$row[Image]'>X</i>";
                            echo "$row[Name]<br><br>$row[InventoryEntryNr]</div>";
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
