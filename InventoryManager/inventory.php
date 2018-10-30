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
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Inventory:</label>
                        <select class="form-control" name="inventory" id="exampleFormControlSelect1">
                            <?php
                            $db = connectToDB();

                            $sql = "SELECT * FROM Inventory";

                            $result = $db->query($sql);

                            if (isset($_GET["inventory"])) {
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        if ($_GET['inventory'] == $row['InventoryNr']) {
                                            echo "<option value='$row[InventoryNr]'  selected>$row[Name]</option>";
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
                        ?>
                        </select>
                    </div>
                </div>
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
                                                <label for="filter">Filter by</label>
                                                <select class="form-control">
                                                    <option value="0" selected>All Snippets</option>
                                                    <option value="1">Featured</option>
                                                    <option value="2">Most popular</option>
                                                    <option value="3">Top rated</option>
                                                    <option value="4">Most commented</option>
                                                </select>
                                            </div>
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
                                                <div class="form-group" id="content_existing_product">
                                                    <label>Select existing Product:</label>
                                                    <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <i class="fas fa-exchange-alt"></i><i class="btn btn-success margin-top full-width" id="button_fade_to_new_product">Or click here to add new Product</i>
                                                </div>

                                                <div class="form-group" id="content_new_product" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="product_name">Product name</label><br>
                                                        <input class="form-control" name="product_name" type="text" min="0">
                                                    </div>
                                                    <div class="form-group shadow-textarea">
                                                    <label for="product_description">Productgroup description</label>
                                                    <textarea class="form-control z-depth-1" name="product_description" rows="3" placeholder="Write something here..."></textarea>
                                                </div>
                                                    <i class="fas fa-exchange-alt btn btn-success margin-top full-width" id="button_fade_to_existing_product">Go back to other content</i>
                                                </div>



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
                                                        <a class="col-sm-12 btn btn-success crop-image margin-bottom">Crop & Upload Image</a>
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
                        echo "  <div class='inventory-item-preview'>";
                        echo "  <i class='btn btn-danger button-remove' id='button_remove_$row[InventoryEntryNr]'>X</i>";
                        echo "  $row[Name]
                                <br>
                                <br>
                                $row[InventoryEntryNr]
                            </div>";
                    }
                }
            ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#image_demo').fadeOut();

            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                enableRotate: true,
                enableOrientation: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'square', //circle
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });

            $('#upload_image').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#image_demo').fadeIn();
                $('#button-upload-pic').fadeIn();
            });

            $('.crop-image').click(function(event) {
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    $.ajax({
                        url: "uploadCroppedPic.php",
                        type: "POST",
                        data: {
                            "image": response
                        },
                        success: function(data) {
                            $('#image_demo').fadeOut();
                            $('#button-upload-pic').fadeOut();
                            $('#uploaded_image').html(data);
                        }
                    });
                })
            });

            $('#buying_date_container input').datepicker({
                format: "dd/mm/yyyy",
                maxViewMode: 2,
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                toggleActive: true
            });

            $('.button-remove').click(function(event) {
                $.ajax({
                    url: 'removeInventoryEntry.php',
                    type: "POST",
                    data: {
                        'nr': event.target.id.split('_')[2]
                    },
                    success: function() {
                        location.reload();
                    },
                    error: function() {
                        alert("Removing inventory entry did not work!");
                    }
                });
            });

            $('#button_fade_to_new_product').click(function(event) {
                $('#content_existing_product').slideUp(750, function() {
                    $('#content_new_product').slideDown(750);
                })
            });

            $('#button_fade_to_existing_product').click(function(event) {
                $('#content_new_product').slideUp(750, function() {
                    $('#content_existing_product').slideDown(750);
                })
            });

        });

    </script>

</body>

</html>
