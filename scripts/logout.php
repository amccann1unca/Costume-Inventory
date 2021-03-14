<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: logout.php
     * 
     * This script destroys the current session and redirects the user to the login screen, index.html. */

    session_start();
    
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Costume Inventory</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=100%, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styleCI.css">
    </head>
    <body>
        <div class="header">
            <h1>UNCA Costume Department</h1>
        </div>
        <h1>You have been logged out.</h1>
        <form action="../index.html">
                <input type="submit" value="Login">
        </form>
    </body>
</html>