$(document).ready(function() {
    $('.button-remove').click(function (event) {
        $.ajax({
            url: 'removeInventoryEntry.php',
            type: "POST",
            data: {
                // the number of the removed button, shown in the id
                'nr': event.target.id.split('_')[2],
                'imgName': event.target.id.split('_')[3]
            },
            success: function () {
                location.reload();
            },
            error: function () {
                alert("Removing inventory entry did not work!");
            }
        });

        /* stops the event at the current DOM object layer to prevent propagation to lower layers and thus prevent opening the modal */
        event.stopPropagation();
    });

    $('#button_fade_to_new_product').click(function () {
        $a = $('#content_existing_product');
        $('#content_existing_product').slideUp(750, function () {
            $b = $('#content_new_product');
            $('#content_new_product').slideDown(750);
        });
    });

    $('#button_fade_to_existing_product').click(function () {
        $('#content_new_product').slideUp(750, function () {
            $('#content_existing_product').slideDown(750);
        });
    });

    $('#inventorySelect').change(function() {
       $('#search_button').click();
    });

});