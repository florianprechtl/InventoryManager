<!-- Modal for the info of products-->
<div class="modal fade" id="info_modal_<?php echo $inventoryEntryNr ?>" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PRODUCT INFO </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                $inventoryEntry = getInventoryEntry($inventoryEntryNr);
            ?>

            <form  id="inventoryEntryUpdateForm" method="POST" action="../inventory/updateInventoryEntry.php" enctype="multipart/form-data">
                <input name="inventory_entry_nr" hidden value="<?=$inventoryEntry->inventoryEntryNr?>">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <?php
                                $db = connectToDB();

                                $sql = "SELECT * FROM Product where ProdNr = $inventoryEntry->productNr";
                                $result = $db->query($sql);

                                if ($result->num_rows > 0) {
                                    echo $row['Image'];
                                    echo $row['ProdNr'];
                                    echo "<div class='inventory-info-item-preview' style=background-image:url(../../imgUploads/" . $row['Image'] . ");>";
                                    echo "</div>";
                                }
                            ?>
                            <label for="name">Name</label><br>
                            <input class="form-control" disabled name="name" type="text" id="name_field_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->name?>">
                        </div>
                        <div class="col-sm-8 form-group">
                            <label for="description">Description</label><br>
                            <textarea class="form-control" rows="12" disabled name="description" id="descr_field_<?php echo $inventoryEntryNr ?>"><?=$inventoryEntry->description?></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="unit">Unit</label><br>
                            <input class="form-control" disabled name="unit" type="text" pattern="^([a-z]|[A-Z]){0,10}$" id="unit_field_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->unit?>">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="amount">Amount</label><br>
                            <input class="form-control" disabled name="amount" type="number" min="0" max="100000" id="amount_field_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->amount?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group date-container">
                            <label for="date_buying">Buying date</label><br>
                            <input class="form-control date-picker-input" disabled name="date_buying" type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" id="buying_date_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->buyingDate?>" readonly="true">
                        </div>
                        <div class="col-sm-6 form-group date-container">
                            <label for="date_expiring">Expiring date</label><br>
                            <input class="form-control date-picker-input" disabled name="date_expiring" type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" id="expiring_date_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->expiringDate?>" readonly="true">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default fas fa-edit" onclick="editInventoryEntry(event)" id="edit_button_<?php echo $inventoryEntryNr ?>"></button>
                    <button type="submit" name="save_changes" class="btn btn-primary" id="save_changes_<?php echo $inventoryEntryNr ?>" style="display: none;" value="save_changes">Save changes</button>
                    <button type="submit" name="dismiss_changes" class="btn btn-danger" id="dismiss_changes_<?php echo $inventoryEntryNr ?>" style="display: none;" value="dismiss_changes">Dismiss changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

