<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: delete.php
     * 
     * Recieves initial user input from deleteInput and the confirmation from 
deleteInputConfirm.php and compares them to be sure match. If they match, a DELETE
query is sent to the database to delete the costume piece with the matching pieceID. 
*/

    session_start();
    
    session_regenerate_id();
    
    include("header.php");
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            require_once ("config.php");
            
            $firstInput = mysqli_real_escape_string($con, $_SESSION['firstInput']);
            $pID = mysqli_real_escape_string($con, $_REQUEST['pieceID']);
            
            if($firstInput == $pID)
            {
                $query1 = "DELETE FROM Piece WHERE pieceID = '$pID'";
                mysqli_query($con, $query1);
        
                if (mysqli_errno($con) != 0) 
                {
                    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
                }
                elseif (mysqli_affected_rows($con) === 0) 
                {
                    echo "Identifier entered does not exits.";
                }
                else
                {
                    echo "You have successfully deleted the piece: $pID.<br>";
                }
                
                mysqli_close($con);
            }
            else
            {
             echo "Identifiers do not match try again.";   
            }
        ?> 
    </body>
</html>