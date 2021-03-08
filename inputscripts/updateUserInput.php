<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: updateUSerInput.php
     * 
     * Receives input from user for updating a user account. To verify the user, 
the form requires the users first name, last name, username, and account type.
Below the user information, there is space for the attribute to be changed email,
password, or account type. The following page, updateUser.php is designed to 
recieve only change at a time. */
    
    include("../scripts/header.php");
?>

<!DOCTYPE html>
<html>
    <body>
        <form action="scripts/updateUser.php" method="post">
            <h2>Details of the User to be updated</h2>
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
            <label>Staff</label><br>
            <h2>What would you like to update</h2>
            <h3>Choose one of the following.</h3>
            <u><b>Email</b></u> Should be a school email.<br>
                <input type="email" name="email" value=""><br><br>
            <u><b>Password</b></u><br>
                <input type="password" name="password" value=""><br><br>
            <u><b>Account Type</b></u><br>
            <input type="radio" id="admin" name= "userType2" value="admin">
            <label>Admin</label>
            <input type="radio" id="student" name= "userType2" value="student">
            <label>Student</label>
            <input type="radio" id="staff" name= "userType2" value="staff">
            <label>Staff</label><br><br><hr>
            <input type="submit" value="Update">
        </form>
    </body>
</html>

