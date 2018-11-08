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
    
    //echo '<span> LGFU </span>';

    function checkinfo($numerot) {
   
   // -- INVENTORY ENTRY TABLE : AMOUNT & STATUS -- //

          
                                                    $db = connectToDB();
                                                    $numero = $numerot; 
    
                                      echo '<span> Hey Jixou </span>';
                                      echo '<br>';

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
                                                    $sql = "SELECT * FROM Inventoryentry";
                                                    $result = $db->query($sql);         
                                               
                                                    $numero=43; 
                                                    $totalAmount = 0;
   
                                                    if ($result->num_rows > 0)
                                                          {
                                                              while ($row = $result->fetch_assoc())
                                                                               {          
                                                                                    // echo '<span> La mec </span>';
                                                                                    // echo '<br>';
                                                                 

                                                                                      if ($row[ProductNr] == $numero) 
                                                                                      {
                                                                                          
                                                    
                                                                                          echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Amount : </span>';
                                                                                          echo '<br>';
                                                                                          echo $row[Amount];
                                                                                          $totalAmount += $row[Amount];
                                                            
                                                                                          echo '<br>';
                                                                                          echo '<br>'; 
                                                            
                                                                                       }                
                                                                                   } 
                                                           }
                                                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Total Amount of this product : </span>';
                                                    echo $totalAmount;                                   
                                                    echo '<br>';
                   }
        
           ?>
