$(document).ready(function() {

    $('#image_demo').fadeOut();

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        enableRotate: true,
        enableOrientation: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square', //circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#upload_image').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        };
        reader.readAsDataURL(this.files[0]);
        $('#image_demo').fadeIn();
        $('#button-upload-pic').fadeIn();
        $('#image_preview_container').fadeOut();
    });

    $('#button_crop_image').click(function() {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $image_array_1 = response.split(";");
            $image_array_2 = $image_array_1[1].split(",");

            $('#image_demo').fadeOut();
            $('#button-upload-pic').fadeOut();
            $('#image_preview_container').fadeIn();
            preshowPicture($image_array_2);
        })
    });

    $('#buying_date_container input').datepicker({
        format: "dd/mm/yyyy",
        maxViewMode: 2,
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        toggleActive: true
    });

    $('.button-remove').click(function(event) {
        $.ajax({
            url: 'removeInventoryEntry.php',
            type: "POST",
            data: {
                // the number of the removed button, shown in the id
                'nr': event.target.id.split('_')[2],
                'imgName': event.target.id.split('_')[3]
            },
            success: function() {
                location.reload();
            },
            error: function() {
                alert("Removing inventory entry did not work!");
            }
        });
    });

    $('#button_fade_to_new_product').click(function() {
        $('#content_existing_product').slideUp(750, function() {
            $('#content_new_product').slideDown(750);
        })
    });

    $('#button_fade_to_existing_product').click(function() {
        $('#content_new_product').slideUp(750, function() {
            $('#content_existing_product').slideDown(750);
        })
    });

    $('#select_prod_existing').change(function() {
        alert('jo there is something changing');
    });

    function preshowPicture(input) {
        var image = new Image();
        image.src = 'data:image/png;' + input[0] + ',' + input[1];

        $imageBase64 = input[1];
        document.forms['inventoryEntryForm'].elements['imageBase64'].value = $imageBase64;

        $('#imagePreview').html(image)
            .css("width", "100%")
            .hide().fadeIn(650);
    }
});