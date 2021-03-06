<?php
    include('inventoryentry.php');

    // Converts date to desired pattern
    // Unused atm
    function convertDate($date) {
        if (preg_match('[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])', $date)) {

            echo $date . '<br>';
            echo "date gets converted";
            // converts form mm/dd/yyyy to yyyy-mm-dd
            $result = explode('/', $date);
            if (count($result) > 1) {
                return $result[2] . '-' . $result[1] . '-' . $result[0];
            } else {
                return $date;
            }

        } else {
            return false;
            redirect('../inventory/inventory.php?wifhiufhwefui=ewfiuewfn');
        }
    }


    /* Use this to include files and additionally pass variables */
    function includeWithVariables($filePath, $variables = array(), $print = true) {
        $output = NULL;
        if(file_exists($filePath)){
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;

    }

    // Redirects within the application path
    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }

    // Returns desired inventory entry, with which u can work afterwards to have everything stored in one object
    function getInventoryEntry($inventoryEntryNr) {
        $db = connectToDB();

        $sql = "SELECT * FROM Product join Inventoryentry where Product.ProdNr = Inventoryentry.ProductNr and InventoryEntryNr = $inventoryEntryNr";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $productNr = $row['ProductNr'];
            $userNr = $row['UserNr'];
            $name = $row['Name'];
            $description = $row['Description'];
            $amount = $row['Amount'];
            $unit = $row['Unit'];
            $status = $row['Status'];
            $expiringDate = $row['ExpiringDate'];
            $buyingDate = $row['BuyingDate'];

            return new Inventoryentry($inventoryEntryNr, $productNr, $userNr,
                $name, $description, $amount, $unit, $status, $expiringDate, $buyingDate);
        } else {
            return 0;
        }
    }

?>
