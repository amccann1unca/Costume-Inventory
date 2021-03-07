<?php
    /* Recieves the pieceID of a costume the user wants to delete and passes to 
deleteConfirm.php for the user to reenter the pieceID. */

    include("../scripts/header.php");
?>
<!DOCTYPE html>
<html>
    
    <body>
        <form action="deleteConfirm.php" method="post">
            <h2>Details of the Costume piece to be deleted</h2>
            <u><b>Piece ID</b></u><br>
                <input type="text" name="pieceID" required><br><br><hr>
            <input type="submit" value="Delete">
        </form>
    </body>
</html>