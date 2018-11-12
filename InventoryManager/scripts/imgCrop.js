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

    $('.date-container input').datepicker({
        format: "yyyy-mm-dd",
        maxViewMode: 2,
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        toggleActive: true
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