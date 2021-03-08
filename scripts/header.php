<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: header.php
     * 
     * This script is included on all pages that output to the user to control 
the look of the site. This page also controls the view of each user type, 
Administrators see all navigation options, Staff can only see 4 functions and
students 3. */

    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Costume Inventory</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="720; url=../scripts/logout.php">
        <link rel="stylesheet" href="../css/styleCI.css">
    </head>
    <body>
        <div class="header">
            <h1>UNCA Drama Department</h1>
            <h5><?php echo "Logged in as: " . $_SESSION['user'] ?></h5>
        </div>
        
        <?php
            if ($_SESSION['type'] == 'admin')
            {
                echo "<div class=\"topnav\">";
                echo "<a href=\"../scripts/home.php\">Home</a>";
                echo "<a href=\"../inputscripts/searchInput.php\">Search</a>";
                echo "<a href=\"../inputscripts/insertInput.php\">Add</a>";
                echo "<a href=\"../inputscripts/deleteInput.php\">Delete</a>";
                echo "<a href=\"../scripts/users.php\">Users</a>";
                echo "<a href=\"../inputscripts/addUserInput.php\">Add User</a>";
                echo "<a href=\"../inputscripts/updateUserInput.php\">Update User</a>";
                echo "<a href=\"../inputscripts/deleteUserInput.php\">Delete User</a>";
                    echo "<div class=\"topnav-right\">";
                    echo "<a href=\"../scripts/logout.php\">Logout</a>";
                    echo "</div>";
                echo "</div>";
            }
            
            if ($_SESSION['type'] == 'staff')
            {
                echo "<div class=\"topnav\">";
                echo "<a href=\"../scripts/home.php\">Home</a>";
                echo "<a href=\"../scripts/searchInput.php\">Search</a>";
                echo "<a href=\"../scripts/insertInput.php\">Add</a>";
                echo "<a href=\"../scripts/users.php\">Users</a>";
                    echo "<div class=\"topnav-right\">";
                    echo "<a href=\"../scripts/logout.php\">Logout</a>";
                    echo "</div>";
                echo "</div>";
            }
            
            if ($_SESSION['type'] == 'student')
            {
                echo "<div class=\"topnav\">";
                echo "<a href=\"../scripts/home.php\">Home</a>";
                echo "<a href=\"../scripts/searchInput.php\">Search</a>";
                echo "<a href=\"../scripts/users.php\">Users</a>";
                    echo "<div class=\"topnav-right\">";
                    echo "<a href=\"../scripts/logout.php\">Logout</a>";
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </body>
</html>



