<?php
    include('basicFunctions.php');

    print_r($_POST);

    if (isset($_POST['save_changes'])) {
        echo "save changes";
    }
    if (isset($_POST['dismiss_changes'])) {
        echo "dismiss changes";
    }
?>