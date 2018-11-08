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
?>
