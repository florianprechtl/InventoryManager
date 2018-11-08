<?php
    include('../common/connectDB.php');

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../styles/resetCss.css">
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="../../styles/inventoryStyles.css">
    <link rel="stylesheet" href="../../additionals/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../additionals/bootstrap/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="../../additionals/jquery/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../additionals/bootstrap/js/bootstrap.js"></script>
    <script src="../../additionals/bootstrap/datepicker/js/bootstrap-datepicker.js"></script>

    <title> Check Amount </title>
</head> 

   <?php
   
   // -- INVENTORY ENTRY TABLE : AMOUNT & STATUS -- //

          
                                                    $db = connectToDB();
                                                    $numero = $_POST['numero']; 
    
                                      echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Hey Jixouuu </span>';

                                                    class Inventoryentry 
                                                    {
                                                        public $productnr;
                                                        public $amount;
                                                        public $status;
                                                        public function __construct($productnr, $amount, $status)
                                                        {
                                                            $this->productnr = $productnr;
                                                            $this->amount = $amount;
                                                            $this->status = $status;
                                                        }
                                                    }
                                                    $sqlD = "SELECT * FROM Inventoryentry";
                                                    //$products = [];
                                                    $resultD = $db->query($sqlD);
                                                    
                                                    
                                                    
                                                    if ($row[Amount] == 400)
                                                    {
                                                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Produuuuuct Nr: </span>';
                                                   // echo "<option value='$row[InventoryEntryNr]'>$row[ProductNr]</option>";
                                                    echo "<span $row[ProductNr]</span>";
                                                                          if ($resultD->num_rows > 0)
                                                                             {
                                                                                  while ($row = $resultD->fetch_assoc())
                                                                                     {                                                         
                                                                                          echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Amount : </span>';
                                                                                          echo "<option value='$row[InventoryEntryNr]'>$row[Amount]</option>";
                                                            
                                                                                          echo '<br>';
                                                                                          echo '<br>'; 
                                                            
                                                                                       }
                                                                               } 
                                                    }
                             ?>
