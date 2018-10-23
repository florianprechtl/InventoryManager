<?php
    include('connectDB.php');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/resetCss.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/inventoryStyles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="croppie/croppie.css">
    <link rel="stylesheet" href="bootstrap/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="croppie/croppie.js"></script>
    <script src="bootstrap/datepicker/js/bootstrap-datepicker.js"></script>

    <title>Register Modal</title>
</head>

     <!--Inventory Showplace-->
        <div class="d-flex justify-content-around flex-wrap bd-highlight mb-3">
            <div class="inventory-item-preview icon-box" data-toggle="modal" data-target="#myModal">
                <a><i class="fas fa-plus add-entry-icon"></i></a>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add new Inventory Item</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form method="POST" action="uploadInventoryentry.php" enctype="multipart/form-data">
                            <div class="modal-body">
                                <p>here you could add a bunch of inputs within a form</p>
                                <p>Maybe we can add a cool blur filter while hovering the pictures (squares) and then show some basic data about the item faded in by the hover</p>
                                <a href="https://codepen.io/mcraig218/pen/uqIae">Click here!</a>

                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Mandatory Info
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" class="form-control" name="name_product">
                                                </div>
                                                <div class="form-group shadow-textarea">
                                                    <label for="exampleFormControlTextarea6">Description</label>
                                                    <textarea class="form-control z-depth-1" name="descr_product" rows="3" placeholder="Write something here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Detail Info
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="upload_image">Image</label><br>
                                                    <input type="file" name="upload_image" id="upload_image" />
                                                </div>
                                                <div class="" id="image_demo" style="width:300px; height: 350p;">
                                                </div>
                                                <div class="container-fluid">
                                                    <div class="row" id="button-upload-pic" style="display: none;">
                                                        <a class="col-sm-12 btn btn-success crop_image margin-bottom">Crop & Upload Image</a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">Productgroup name</label><br>
                                                    <input class="form-control" name="name_prod_gr" type="text">
                                                </div>
                                                <div class="form-group shadow-textarea">
                                                    <label for="exampleFormControlTextarea6">Productgroup description</label>
                                                    <textarea class="form-control z-depth-1" name="descr_prod_gr" rows="3" placeholder="Write something here..."></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="unit">Unit</label><br>
                                                    <input class="form-control" name="unit" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">Amount</label><br>
                                                    <input class="form-control" name="amount" type="number" min="0">
                                                </div>
                                                <div class="form-group" id="buying-date-container">
                                                    <label for="date_buying">Buying date</label><br>
                                                    <input class="form-control" name="date_buying" type="text">
                                                </div>
                                                <div class="form-group" id="buying-date-container">
                                                    <label for="date_expiring">Expiring date</label><br>
                                                    <input class="form-control" name="date_expiring" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
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
                        echo "  <div class='inventory-item-preview'>
                                    $row[Name]
                                </div>";
                    }
                }
            ?>
        </div>
</div>
