<!-- Modal -->
<div class="modal fade" id="info_modal_<?php echo $inventoryEntryNr ?>" tabindex="-1" role="dialog"
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
                $db = connectToDB();

                $sql = "SELECT * FROM Product join Inventoryentry where Product.ProdNr = Inventoryentry.ProductNr and InventoryEntryNr = $inventoryEntryNr";
                $result = $db->query($sql);
     
                $stock = 0;
                $totalAmount = 0;
               

                //Utilisation de Product table :
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Product number reference: </span>';
                        echo $row['ProdNr'];
                        echo '<br>';

                        //1
                        echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Product name : </span>';
                        echo $row['Name'];
                        echo '<br>';
                        echo '<br>';

                        //2
                        echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Description : </span>';
                        echo $row['Description'];
                        echo '<br>';

                        //3
                        echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Unit : </span>';
                        echo $row['Unit'];
                        echo '<br>';

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
                echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Total Amount of this product : </span>';
                echo $totalAmount;

                echo '<br>';
                echo '<br>';

                ?>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-default fas fa-edit" onclick="editInventoryEntry(event)" id="edit_button_<?php echo row[InventoryEntryNr]?>"></button>
                <button type="submit" class="btn btn-primary" id="save_changes_<?php echo row[InventoryNr]?>" hidden>Save changes</button>
                <button type="submit" class="btn btn-danger" id="dismiss_changes_<?php echo row[InventoryEntryNr]?>" hidden>Dismiss changes</button>
            </div>
        </div>
    </div>
</div>

