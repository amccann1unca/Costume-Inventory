<?php
    /* Recieves from the user details of a user to be deleted. The form recieves
data for first name, last name, username, and account type. This data is passed 
to deleteUserConfirm.php. */

    include("../scripts/header.php");
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="deleteUserConfirm.php" method="post">
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