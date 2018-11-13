<!-- All the expired products shoukd appear as a list on this page to inform the user -->
<?php
	include('../common/connectDB.php');
    include('../common/basicFunctions.php');
	
    $db = connectToDB();
	
?>

               
            <?php
                $inventoryEntry = getInventoryEntry($inventoryEntryNr);
            ?>

            <form  id="inventoryEntryUpdateForm" method="POST" action="../inventory/updateInventoryEntry.php" enctype="multipart/form-data">
                <input name="inventory_entry_nr" hidden value="<?=$inventoryEntry->inventoryEntryNr?>">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name">Name</label><br>
                            <input class="form-control" disabled name="name" type="text" id="name_field_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->name?>">
                        </div>
                        
                    </div>


              
                     
                        <div class="col-sm-6 form-group date-container">
                            <label for="date_expiring">Expiring date</label><br>
                            <input class="form-control" disabled name="date_expiring" type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" id="expiring_date_<?php echo $inventoryEntryNr ?>" value="<?=$inventoryEntry->expiringDate?>">
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
