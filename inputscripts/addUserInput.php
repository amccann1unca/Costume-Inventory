<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: addUserInput.php
     * 
     * Recives the details of user to be added; fistname, lastname, email,
password, and account type. This information is sent to addUser.php.*/

   include("../scripts/header.php"); 
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="../scripts/addUser.php" method="post">
            <h2>Details of the New User</h2>
            <u><b>First Name</b></u><br>
                <input type="text" name="firstName" required><br><br>
            <u><b>Last Name</b></u><br>
                <input type="text" name="lastName" required><br><br>
            <u><b>Email</b></u> Should be a school email.<br>
                <input type="email" name="email" required><br><br>
            <u><b>Password</b></u><br>
                <input type="password" name="password" required><br><br>
            <u><b>Account Type</b></u><br>
            <input type="radio" id="admin" name= "userType" value="admin">
            <label>Admin</label>
            <input type="radio" id="student" name= "userType" value="student">
            <label>Student</label>
            <input type="radio" id="staff" name= "userType" value="staff">
            <label>Staff</label><br><br><hr>
            <input type="submit" value="Add">
        </form>
    </body>
</html>


