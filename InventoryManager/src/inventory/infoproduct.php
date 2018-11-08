<?php
    include('../common/connectDB.php');
    //include('../inventory/functionCheckAmount.php');


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

    <title> Product Info </title>
</head>

    
<body>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  for product info click here
    </button> 
 
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PRODUCT INFO </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        
           <div class="mx-auto">
               
                                             <!-- PRODUCT TABLE : NAME & DESCRIPTION -->
               
                        <?php
                                                    $db = connectToDB();
                                                    $numero = 42;
               
               
                                                    class Product {
                                                        public $name;
                                                        public $description;
                                                        public $unit;
                                                        public $prodnr;
                                                        public function __construct($name, $description, $unit, $prodnr) {
                                                            $this->name = $name;
                                                            $this->description = $description;
                                                            $this->unit = $unit;
                                                            $this->prodnr = $prodnr;
                                                        }
                                                    }
                                                    $sql = "SELECT * FROM Product";
                                                    $result = $db->query($sql);
              
                                                 
               
               
               //Utilisation de Product table :                                                   
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) { 
                                                            
                                                       if ($row[ProdNr] == $numero){
                                                          echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Product number reference: </span>';
                                                           echo $row[ProdNr];
                                                           echo '<br>';
                                                            
                                                         //1
                                                          echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Product name : </span>';
                                                          echo $row[Name];
                                                          echo '<br>';

                                                         //2
                                                          echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Description : </span>';
                                                          echo $row[Description];
                                                          echo '<br>';
                                                         //3
                                                          echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Unit : </span>';
                                                          echo $row[Unit];
                                                          echo '<br>';

                                                           }
                                                          
                                                            
                                                        }
                                                    }
               
                                                  
                       
               
               
                           ?>
               
               <?php
    
   
    checkinfo(42);
    
    function checkinfo($numero) {
   
   // -- INVENTORY ENTRY TABLE : AMOUNT & STATUS -- //

          
                                                    $db = connectToDB();
                                                    
    
                                     // echo '<span> Hey Jixou </span>';
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
                                                                                          echo $row[Amount];
                                                                                          $totalAmount += $row[Amount];
                                                                                          
                                                                                          echo '<br>'; 

                                                                                          
                                                                                          echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Status : </span>';
                                                                                         
                                                                                          if( $row[Status] == 0) 
                                                                                              {
                                                                                              
                                                                                              echo '<span> non-opened </span>';
                                                                            
                                                                                              } 
                                                                                          if( $row[Status] == 1) 
                                                                                              {
                                                                                              
                                                                                              echo '<span> opened </span>';

                                                                                              } 
                                                                                          else
                                                                                              {
                                                                                              
                                                                                              echo '<span> no relative info </span>';

                                                                                              } 
                                                            
                                                                                          echo '<br>'; 
                                                            
                                                                                       }                
                                                                                   } 
                                                           }
                                                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Total Amount of this product : </span>';
                                                    echo $totalAmount;                                   
                                                    echo '<br>';
                   }
        
           ?>

              </div>
          
          
          
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>


</html>
