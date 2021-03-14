<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: deleteInput.php
     * 
     * Recieves the pieceID of a costume the user wants to delete and passes to 
deleteConfirm.php for the user to reenter the pieceID. */

    include("../scripts/header.php");
?>
<!DOCTYPE html>
<html>
    
    <body>
        <form action="deleteConfirm.php" method="post">
            <h2>Please enter the details of the costume piece to be deleted</h2>
            <u><b>Piece ID</b></u><br>
                <input type="text" name="pieceID" required><br><br><hr>
            <input type="submit" value="Delete">
        </form>
    </body>
</html>