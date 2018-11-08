<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $inventory_nr ?>" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    checkfirstinfo(47);

                ?>



                <?php

                checksecondinfo(47);

                function checksecondinfo($numero)
                {

                    // -- INVENTORY ENTRY TABLE : AMOUNT & STATUS -- //


                    $db = connectToDB();


                    //echo '<span> Hey Jixou </span>';
                    echo '<br>';

                    $sql = "SELECT * FROM Inventoryentry";
                    $result = $db->query($sql);


                    $totalAmount = 0;
                    $stock = 1;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // echo '<span> La mec </span>';
                            // echo '<br>';


                            if ($row['ProductNr'] == $numero) {
                                //4
                                echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > - Box n°</span>';
                                echo $stock;
                                echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold"> : </span>';
                                echo '<br>';

                                $stock += 1;

                                //5
                                echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Amount in stock : </span>';
                                echo $row['Amount'];

                                $totalAmount += $row['Amount'];

                                echo '<br>';

                                //6
                                echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Status : </span>';

                                /* if( $row[Status] == 0)
                                     {

                                     echo '<span> non-opened </span>';

                                     }*/
                                if ($row['Status'] == 1) {

                                    echo '<span> opened </span>';

                                }
                                if ($row['Status'] == NULL) {

                                    echo '<span> no relative info </span>';

                                }

                                echo '<br>';

                                //7
                                echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Expiring date : </span>';
                                echo $row['ExpiringDate'];

                                echo '<br>';
                                echo '<br>';

                            }

                        }
                    }
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Total Amount of this product : </span>';
                    echo $totalAmount;

                    echo '<br>';
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

