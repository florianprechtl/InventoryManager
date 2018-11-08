<div class="modal fade" id="add_inventory_modal" role="dialog">
    <div class="modal-dialog" style="max-width: 700px;">

        <!-- Modal content-->
        <div class="modal-content">


            <!-- Modal header-->
            <div class="modal-header">
                <h4 class="modal-title">Add new Inventory</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <!-- Form which contains body (input elements) and footer (submit button) of the modal -->
            <form id="add_inventory_form" method="POST" action="uploadInventory.php" enctype="multipart/form-data"></form>

            <!-- Modal body-->
            <div class="modal-body">
                <div class="form-group" id="content_new_product">
                    <div class="form-group">
                        <label for="name_inventory">Inventory name</label><br>
                        <input class="form-control" name="name_inventory" type="text" form="add_inventory_form">
                    </div>
                    <div class="form-group shadow-textarea">
                        <label for="descr_prod_new">Inventory description</label>
                        <textarea class="form-control z-depth-1" name="descr_prod_new" rows="3" placeholder="Write something here..."  form="add_inventory_form"></textarea>
                    </div>
                </div>
            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <button type="submit" name="add_new_inventory" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
