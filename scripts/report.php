<?php
    /*  Recieves the filename from search.php and pulls the output array from the
session array. Then goes on to force a header change that triggers the download 
of the CSV. Inorder for the array to be converted to a CSV it must be added row 
by row to the PHP generated file for ouput.
     */

    session_start();
    
    require_once ("config.php");
    
    if ($_REQUEST['fileName'] != "") 
    {
        $fileName = $_REQUEST['fileName'] . ".csv";
        $output = $_SESSION['output'];
        
        header("Content-Type: text/csv; ");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Pragma: no-cache");
        header("Expires: 0");
    
        $out = fopen("php://output", 'w');
    
        $keys = array_keys($output[0]);
        fputcsv($out, $keys);
        fputs($out, PHP_EOL);
    
        foreach ($output as $row)
        {
            fputcsv($out, $row);
        }
        
        fclose($out);
    }
?>