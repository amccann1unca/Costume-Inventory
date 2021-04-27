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
        switch ($_SESSION['type'])
        {
            case 'admin';
                $query = "SELECT *
                          FROM Users";
                break;
            case 'staff';
                $query = "SELECT *
                          FROM Users 
                          WHERE userType = 'staff'
                          AND userType = 'student'";
                break;
            case 'student';
                $query = "SELECT * FROM Users WHERE userType = 'student'";
                break;
        }
        
        $result = mysqli_query($con, $query);
        
        while ($row = mysqli_fetch_array($result)) 
        {
            if ($row['userType'] == 'admin')
            {
                $i = 0;
                $adminArray[$i] = $row;
                $i++;
            }
            else if ($row['userType'] == 'staff')
            {
                $i = 0;
                $staffArray[$i] = $row;
                $i++;
            }
            else if ($row['userType'] == 'student')
            {
                $i = 0;
                $studentArray[$i] = $row;
                $i++;
            }
        }
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
            if (is_array($adminArray) && count($adminArray) > 0)
            {
                foreach ($adminArray as $row1) 
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
            }
            ?>
        </table>
        
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
            if (is_array($staffArray) && count($staffArray) > 0)
            {
                foreach ($staffArray as $row2) 
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
            }
            ?>
        </table>

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
            if (is_array($studentArray) && count($studentArray) > 0)
            {
                foreach ($studentArray as $row3) 
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
            }
            ?>
        </table>
    </body>
</html>