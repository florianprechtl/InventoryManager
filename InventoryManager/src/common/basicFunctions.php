<?php
    function convertDate($date) {
        echo $date.'<br>';
        echo "date gets converted";
        // converts form mm/dd/yyyy to yyyy-mm-dd
        $result = explode('/', $date);
        return $result[2].'-'.$result[1].'-'.$result[0];
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


    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }

    function checkfirstinfo($numero) {
        $db = connectToDB();

        $sql = "SELECT * FROM Product";
        $result = $db->query($sql);

        //Utilisation de Product table :
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                if ($row['ProdNr'] == $numero) {
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Product number reference: </span>';
                    echo $row['ProdNr'];
                    echo '<br>';

                    //1
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Product name : </span>';
                    echo $row['Name'];
                    echo '<br>';
                    echo '<br>';

                    //2
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Description : </span>';
                    echo $row['Description'];
                    echo '<br>';

                    //3
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Unit : </span>';
                    echo $row['Unit'];
                    echo '<br>';
                }
            }
        }
    }


    function checksecondinfo($numero) {
        // -- INVENTORY ENTRY TABLE : AMOUNT & STATUS -- //

        $db = connectToDB();

        //echo '<span> Hey Jixou </span>';
        echo '<br>';

        $sql = "SELECT * FROM Inventoryentry";
        $result = $db->query($sql);

        $totalAmount = 0;
        $stock = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // echo '<span> La mec </span>';
                // echo '<br>';

                if ($row['ProductNr'] == $numero) {
                    //4
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > - Box n°</span>';
                    echo $stock;
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold"> : </span>';
                    echo '<br>';

                    $stock += 1;

                    //5
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Amount in stock : </span>';
                    echo $row['Amount'];

                    $totalAmount += $row['Amount'];

                    echo '<br>';

                    //6
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Status : </span>';

                    /* if( $row[Status] == 0)
                         {

                         echo '<span> non-opened </span>';

                         }*/
                    if ($row['Status'] == 1) {
                        echo '<span> opened </span>';
                    }
                    if ($row['Status'] == NULL) {
                        echo '<span> no relative info </span>';
                    }

                    echo '<br>';

                    //7
                    echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Expiring date : </span>';
                    echo $row['ExpiringDate'];

                    echo '<br>';
                    echo '<br>';
                }
            }
        }
        echo '<span style = "color:grey; font-variant: small-caps; font-weight:bold" > Total Amount of this product : </span>';
        echo $totalAmount;

        echo '<br>';
        echo '<br>';
    }
?>
