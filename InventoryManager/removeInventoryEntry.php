<?php
    include('connectDB.php');

    $db = connectToDB();
    $inventoryEntryNr = $_POST['nr'];

    $sql = "DELETE FROM InventoryEntry WHERE InventoryEntryNr = $inventoryEntryNr";
    $db->query($sql);

    ################################
    ## delete img from ftp server ##
    ################################

    // variables
    $file = "imgUploads/$_POST[imgName]";
    $ftp_server = "ws-prod-am2-223.ftp.azurewebsites.windows.net";
    $ftp_user_name = "1801674PHP\user1801674";
    $ftp_user_pass = "Blumenbeet1";

    // connect to ftp
    $conn_id = ftp_connect($ftp_server);

    // login with username and password
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

    // try to delete file
    if (ftp_delete($conn_id, $file)) {
     echo "$file deleted successful\n";
    } else {
     echo "could not delete $file\n";
    }
?>