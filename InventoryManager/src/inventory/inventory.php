<?php
    include('../common/basicFunctions.php');
    includeWithVariables('../common/connectDB.php', null);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/resetCss.css">
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="../../styles/inventoryStyles.css">
    <link rel="stylesheet" href="../../additionals/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../additionals/croppie/croppie.css">
    <link rel="stylesheet" href="../../additionals/bootstrap/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="../../additionals/jquery/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../additionals/bootstrap/js/bootstrap.js"></script>
    <script src="../../additionals/croppie/croppie.js"></script>
    <script src="../../additionals/bootstrap/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../../scripts/imgCrop.js"></script>

    <title>Inventory Manager</title>
</head>

<body>
    <div class="container-fluid" style="max-width: 800px; width:100%">

        <!--Header-->
        <div class="row header">
            <h1 class="col-sm-12" align="center">Inventory Manager</h1>
        </div>

        <!--Search bar and Inventory select-->
        <form method="GET" action="inventory.php" enctype="multipart/form-data">
            <div class="row justify-content-between margin-top">
                <!-- Left side - inventory select -->
                <div class="col-sm-5">
                    <div class="form-group">

                        <label for="exampleFormControlSelect1">Select Inventory:</label>
                        <select class="form-control" name="inventory" id="exampleFormControlSelect1">
                            
                     <!--for infoproduct use that -->
                            <?php
                                $db = connectToDB();

                                // $sql = "SELECT * FROM Inventory join Inventroyusermatrix on inventory.InventoryNr = Inventroyusermatrix.InventroyNr WHERE UserNr = $_SESSION[user_nr]";
                                $sql = "Select * from Inventory";

                                $result = $db->query($sql);

                                if (isset($_GET["inventory"])) {
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            if ($_GET['inventory'] == $row['InventoryNr']) {
                                                echo "<option value='$row[InventoryNr]'  selected>$row[Name]</option>";
                                                $inventory = $_GET['inventory'];
                                            } else {
                                                echo "<option value='$row[InventoryNr]'>$row[Name]</option>";
                                            }
                                        }
                                    }
                                } else {
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='$row[InventoryNr]'>$row[Name]</option>";
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
                includeWithVariables('addInventoryEntry_Modal.php', array('inventory' => $inventory));
            ?>
            <?php
                $db = connectToDB();
        
                if (isset($_GET["inventory"])) {
                    $inventoryNr = $_GET["inventory"];
                    $sql = "SELECT * FROM inventoryentry inner join product on inventoryentry.ProductNr = product.ProdNr where InventoryNr = $inventoryNr";
                } else {
                    $sql = "SELECT * FROM inventoryentry inner join product on inventoryentry.ProductNr = product.ProdNr where InventoryNr = 1;";
                }
        
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $img = file_get_contents("imgUploads/$row[Image]");
                        
                        echo "<div class='inventory-item-preview' style=background-image:url(../../imgUploads/" . $row['Image'] . ");>";
                        echo "<i class='btn btn-danger button-remove' id='button_remove_$row[InventoryEntryNr]_$row[Image]'>X</i>";
                        echo "$row[Name]<br><br>$row[InventoryEntryNr]</div>";
                    }
                }
            ?>
        </div>
    </div>

</body>

</html>
