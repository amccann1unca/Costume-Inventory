<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: deleteUserConfirm.php
     * 
     * Recieves the original input from deleteUserInput and saves in a session 
variable for comparision in deleteUser.php.  The form requires the user to reenter
the user details previously given and passes them to deleteUser.php. */

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
            <h1>UNCA Drama Department</h1>
    </div>
    <body>
        <?php
            require_once ("../scripts/config.php");
        
            $_SESSION['firstFName'] = mysqli_real_escape_string($con, $_REQUEST['firstName']);
            $_SESSION['firstLName'] = mysqli_real_escape_string($con, $_REQUEST['lastName']);
            $_SESSION['firstUName'] = mysqli_real_escape_string($con, $_REQUEST['username']);
            $_SESSION['firstType'] = mysqli_real_escape_string($con, $_REQUEST['userType']);
        ?>
        <form action="../scripts/deleteUser.php" method="post">
            <h2>Details of the User to be Deleted</h2>
            <u><b>First Name</b></u><br>
                <input type="text" name="firstName" required><br><br>
            <u><b>Last Name</b></u><br>
                <input type="text" name="lastName" required><br><br>
            <u><b>Username</b></u><br>
                <input type="text" name="username" required><br><br>
            <u><b>Account Type</b></u><br>
            <input type="radio" id="admin" name= "userType" value="admin">
            <label>Admin</label>
            <input type="radio" id="student" name= "userType" value="student">
            <label>Student</label>
            <input type="radio" id="staff" name= "userType" value="staff">
            <label>Staff</label><br><br><hr>
            <input type="submit" value="Delete">
        </form>
    </body>
</html>

