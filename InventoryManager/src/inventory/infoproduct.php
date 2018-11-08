<?php
    include('../common/basicFunctions.php');
?>
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
                    checkfirstinfo($inventoryEntryNr);
                    checksecondinfo($inventoryEntryNr);
                ?>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

