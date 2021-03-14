<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: deleteUser.php
     * 
     * Receives orignal input from deleteUserInput.php and deleteUserConfirm.php
compares them to ensure they match. Then using a DELETE query that compares first
name, user name, and usertype to specify what user to delete. */

    session_start();
    
    session_regenerate_id();
    
    include("header.php");
    
    require_once ("config.php");
        
    $fName = mysqli_real_escape_string($con, $_REQUEST['firstName']);
    $lName = mysqli_real_escape_string($con, $_REQUEST['lastName']);
    $uName = mysqli_real_escape_string($con, $_REQUEST['username']);
    $uType = mysqli_real_escape_string($con, $_REQUEST['userType']);
    $firstFName = mysqli_real_escape_string($con, $_SESSION['firstFName']);
    $firstLName = mysqli_real_escape_string($con, $_SESSION['firstLName']);
    $firstUName = mysqli_real_escape_string($con, $_SESSION['firstUName']);
    $firstType = mysqli_real_escape_string($con, $_SESSION['firstType']);
            
    $fName = strtolower($fName);
    $fName = ucfirst($fName);
    $lName = strtolower($lName);
    $lName = ucfirst($lName);
    $firstFName = strtolower($firstFName);
    $firstFName = ucfirst($firstFName);
    $firstLName = strtolower($firstLName);
    $firstLName = ucfirst($firstLName);

    if ($fName == $firstFName && $lName == $firstLName && $uName == $firstUName && $uType == $firstType)
    {
        $query = "DELETE FROM Users WHERE firstName = '$fName' AND userName = '$uName' AND userType = '$uType';";
        mysqli_query($con, $query);
        
        if (mysqli_errno($con) != 0) 
        {
            echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
        }
        elseif (mysqli_affected_rows($con) === 0)
        {
            echo "User does not exist.";
        }
        else 
        {
            echo "You have successfully deleted the account for $uName.<br>";
        }
            
        mysqli_close($con);
    }
    else
    {
        echo("Identifiers do not match.");
    }
?> 