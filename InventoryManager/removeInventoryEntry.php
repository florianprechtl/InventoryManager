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

    // connect to ftp
    $conn_id = ftp_connect('ftp://waws-prod-am2-223.ftp.azurewebsites.windows.net');      

    // login with username and password
    $login_result = ftp_login($conn_id, '1801674PHP\user1801674', 'Blumenbeet1');

    // try to delete file
//    if (ftp_delete($conn_id, $file)) {
//     echo "$file deleted successful\n";
//    } else {
//     echo "could not delete $file\n";
//    }
?>