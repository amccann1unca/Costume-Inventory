<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: users.php
     * 
        Simple script that displays all users recorded in the User database based
on the current users type. It displays the first name, last name, and email of 
each user. Administrators can see all users, staff are limited to other staff members
and all students, and students can only see other students.*/

    session_start();
    
    session_regenerate_id();
    
    include ("header.php");
    include ("config.php");
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
        if ($_SESSION['type'] == 'admin')
        {
            $query1 = "SELECT * FROM Users WHERE userType = 'admin'";
            $result1 = mysqli_query($con, $query1);
        ?>
        
        <h2>Users</h2>
        <h3>Administrators</h3>
        <br>
        
        <table border="0" cellspacing="2" cellpadding="2">
            <tr> 
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>

            <?php
            while ($row1 = mysqli_fetch_array($result1)) 
            {
                $fname = $row1['firstName'];
                $lname = $row1['lastName'];
                $email = $row1['email'];
            ?>

                <tr> 
                    <td><?php echo "$fname"; ?></td>
                    <td><?php echo "$lname"; ?></td>
                    <td><?php echo "$email"; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php
        }
        ?>
        
        <?php
        if ($_SESSION['type'] != 'student')
        {
            $query2 = "SELECT * FROM Users WHERE userType = 'staff'";
            $result2 = mysqli_query($con, $query2);
        ?>
        
        <br>
        <h3>Staff</h3>
        <br>
        
        <table border="0" cellspacing="2" cellpadding="2">
            <tr> 
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>

            <?php
            while ($row2 = mysqli_fetch_array($result2)) 
            {
                $fname = $row2['firstName'];
                $lname = $row2['lastName'];
                $email = $row2['email'];
            ?>

                <tr> 
                    <td><?php echo "$fname"; ?></td>
                    <td><?php echo "$lname"; ?></td>
                    <td><?php echo "$email"; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php
        }
        ?>
        
        <?php
            $query3 = "SELECT * FROM Users WHERE userType = 'student'";
            $result3 = mysqli_query($con, $query3);
        ?>

        <br>
        <h3>Students</h3>
        <br>
        
        <table border="0" cellspacing="2" cellpadding="2">
            <tr> 
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>

            <?php
            while ($row3 = mysqli_fetch_array($result3)) 
            {
                $fname = $row3['firstName'];
                $lname = $row3['lastName'];
                $email = $row3['email'];
            ?>

                <tr> 
                    <td><?php echo "$fname"; ?></td>
                    <td><?php echo "$lname"; ?></td>
                    <td><?php echo "$email"; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>