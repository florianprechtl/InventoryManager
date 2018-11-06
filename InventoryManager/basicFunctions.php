<?php
    function convertDate($date) {
        echo $date.'<br>';
        echo "date gets converted";
        // converts form mm/dd/yyyy to yyyy-mm-dd
        $result = explode('/', $date);
        return $result[2].'-'.$result[1].'-'.$result[0];
    }

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
?>
