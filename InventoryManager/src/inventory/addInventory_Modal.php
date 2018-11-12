<div class="modal fade" id="add_inventory_modal" role="dialog">
    <div class="modal-dialog" style="max-width: 700px;">

        <!-- Modal content-->
        <div class="modal-content">

            <!-- Modal header-->
            <div class="modal-header">
                <h4 class="modal-title">Add new Inventory</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body-->
            <div class="modal-body">
                <div class="form-group" id="content_new_inventory">
                    <div class="form-group">
                        <label for="name_inventory">Inventory name</label><br>
                        <input class="form-control" required name="name_inventory" type="text">
                    </div>
                    <div class="form-group shadow-textarea">
                        <label for="description_inventory">Inventory description</label>
                        <textarea class="form-control z-depth-1" name="description_inventory" rows="3" placeholder="Write something here..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <button type="submit" name="add_new_inventory" class="btn btn-primary" value="add_new_inventory">Submit</button>
                <button type="button" form="" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>
