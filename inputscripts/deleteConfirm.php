<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: deleteConfirm.php
     * 
     * This page requires the user to reenter the pieceID of the costume to be
deleted. It also saves the original entry in a sessiion variable for comparison 
in the delete.php script. */

    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Costume Inventory</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=100%, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styleCI.css">
    </head>
    <div class="header">
            <h1>UNCA Costume Inventory</h1>
    </div>
    <body>
        <?php
        require_once ("../scripts/config.php");
        
        $_SESSION['firstInput'] = mysqli_real_escape_string($con, $_REQUEST['pieceID']);
        ?>
        <form action="../scripts/delete.php" method="post">
            <h2>Please confirm the details of the costume piece to be deleted</h2>
            <u><b>Piece ID</b></u><br>
                <input type="text" name="pieceID" required><br><br><hr>
            <input type="submit" value="Delete">
        </form>
    </body>
</html>