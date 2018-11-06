<?php
include('connectDB.php');

$db = connectToDB();
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/resetCss.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/inventoryStyles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/datepicker/js/bootstrap-datepicker.js"></script>

    <title>Register Modal</title>
</head>

<body>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="max-width: 700px;">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new Inventory Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="inventoryEntryForm" method="POST" action="uploadInventoryEntry.php?inventory=<?php echo $inventory ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <p>here you could add a bunch of inputs within a form</p>
                        <p>Maybe we can add a cool blur filter while hovering the pictures (squares) and then show some basic data about the item faded in by the hover</p>
                        <a href="https://codepen.io/mcraig218/pen/uqIae">Click here!</a>

                        <input type="hidden" name="imageBase64" value="">

                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Product Info
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">

                                            <!-- Picture -->
                                            <div class="col col-sm-5">
                                                <div class="form-group" id="image_preview_container">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="upload_image" accept=".png, .jpg, .jpeg" />
                                                            <label for="upload_image"><i class="far fa-edit" id="image_upload_icon"></i></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="image_demo" style="width:300px; height:350px;">
                                                </div>
                                                <div class="container-fluid">
                                                    <div class="row" id="button-upload-pic" style="display: none;">
                                                        <a class="col-sm-12 btn btn-success crop-image margin-bottom" id="button_crop_image">Crop & Upload Image</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col col-sm-7">
                                                <!-- Existing product -->
                                                <div class="form-group" id="content_existing_product">
                                                    <label for="name_prod_existing">Select existing Product:</label><br>
                                                    <select class="form-control" name="name_prod_existing">
                                                        <option value=""></option>
                                                        <?php
                                                        class Product {
                                                            public $name;
                                                            public $description;
                                                            public $img;

                                                            public function __construct($name, $description, $img) {
                                                                $this->name = $name;
                                                                $this->description = $description;
                                                                $this->img = $img;
                                                            }
                                                        }

                                                        $sql = "SELECT * FROM Product";
                                                        $products = [];

                                                        $result = $db->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                array_push($products, new Product($row['Name'], $row['Description'], $row['Image']));
                                                                echo "<option value='$row[ProdNr]'>$row[Name]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <a class="btn btn-success margin-top full-width" id="button_fade_to_new_product">
                                                        <i class="float-left fas fa-exchange-alt" style="line-height: 24px;"></i>Or click here to add new Product
                                                    </a>
                                                </div>


                                                <!-- New product -->
                                                <div class="form-group" id="content_new_product" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="name_prod_new">Product name</label><br>
                                                        <input class="form-control" name="name_prod_new" type="text" min="0">
                                                    </div>
                                                    <div class="form-group shadow-textarea">
                                                        <label for="descr_prod_new">Product description</label>
                                                        <textarea class="form-control z-depth-1" name="descr_prod_new" rows="3" placeholder="Write something here..."></textarea>
                                                    </div>
                                                    <a class="btn btn-success margin-top full-width" id="button_fade_to_existing_product">
                                                        <i class="float-left fas fa-exchange-alt" style="line-height: 24px;"></i>Go back to other content
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Entry Info
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="unit">Unit</label><br>
                                            <input class="form-control" name="unit" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount</label><br>
                                            <input class="form-control" name="amount" type="number" min="0">
                                        </div>
                                        <div class="form-group" id="buying_date_container">
                                            <label for="date_buying">Buying date</label><br>
                                            <input class="form-control" name="date_buying" type="text">
                                        </div>
                                        <div class="form-group" id="buying_date_container">
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
</body>
</html>