<!-- Modal -->
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

            <form  id="inventoryEntryUpdateForm" method="POST" action="updateInventoryEntry.php" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="unit">Name</label><br>
                            <input class="form-control" disabled name="name" type="text" id="name_field_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->name?>">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="amount">Description</label><br>
                            <textarea class="form-control" disabled name="description" id="descr_field_<?php echo $inventoryEntryNr ?>"><?=$inventoryEntry->description?></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="unit">Unit</label><br>
                            <input class="form-control" disabled name="unit" type="text" id="unit_field_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->unit?>">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="amount">Amount</label><br>
                            <input class="form-control" disabled name="amount" type="number" min="0" id="amount_field_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->amount?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group date-container">
                            <label for="date_buying">Buying date</label><br>
                            <input class="form-control" disabled name="date_buying" type="text" id="buying_date_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->buyingDate?>">
                        </div>
                        <div class="col-sm-6 form-group date-container">
                            <label for="date_expiring">Expiring date</label><br>
                            <input class="form-control" disabled name="date_expiring" type="text" id="expiring_date_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->expiringDate?>">
                        </div>
                    </div>
                </div>
            </form>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-default fas fa-edit" onclick="editInventoryEntry(event)" id="edit_button_<?php echo $inventoryEntryNr ?>"></button>
                <button type="submit" class="btn btn-primary" onclick="saveInventoryEntry(event)" id="save_changes_<?php echo $inventoryEntryNr ?>" style="display: none;">Save changes</button>
                <button type="submit" class="btn btn-danger" id="dismiss_changes_<?php echo $inventoryEntryNr ?>" style="display: none;">Dismiss changes</button>
            </div>
        </div>
    </div>
</div>
