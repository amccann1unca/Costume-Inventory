<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: login.php
     * 
     * The login script does not interface with the user. It receives the users 
credentials from index.html and attempts to verify them against the user 
database. The current users username, first name, and user type are save in the
session array. If the user inputs the wrong user name, password, or both they 
are redirected back to index.html by forced header changes. */

    ini_set('session.use_only_cookies', 1);
    
    session_start();
    
    require_once ("config.php");

    $uName = mysqli_real_escape_string($con, $_REQUEST['username']);
    $passWord = mysqli_real_escape_string($con, $_REQUEST['password']);
        
    $query = "SELECT firstName, password, userType FROM Users WHERE userName = '$uName'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
        
    if (mysqli_errno($con) != 0)
    {
        echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
    }
     
    mysqli_close($con);
    
    // Verifying user exists by checking for empty in the first element of the result array.
    if ($row[0] == "")
    {
        header("location: ../index.html");
    }
    // Comparing the password given to the hashed password in the database.
    else if (password_verify($passWord, $row[1]))
    {
        $_SESSION['user'] = $uName;
        $_SESSION['userFName'] = $row[0];
        $_SESSION['type'] = $row[2];
        header("location: home.php");
    }
    // Login failed return to Login page
    else
    {
        header("location: ../index.html");
    }
?> 