<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: addUser.php
     * 
     * Receives input from addUserInput.php. It creates a username from the 
email, by taking all the characters before the @ symbol. Then the first name,
last name, username, email, password, and user type are added to the database via
an INSERT query. */

    session_start();
    
    session_regenerate_id();
    
    include("header.php");

    require_once ("config.php");

    $fName = mysqli_real_escape_string($con, $_REQUEST['firstName']);
    $lName = mysqli_real_escape_string($con, $_REQUEST['lastName']);
    $eMail = mysqli_real_escape_string($con, $_REQUEST['email']);
    $tempPass = mysqli_real_escape_string($con, $_REQUEST['password']);
    $uType = mysqli_real_escape_string($con, $_REQUEST['userType']);
        
    $fName = strtolower($fName);
    $fName = ucfirst($fName);
    $lName = strtolower($lName);
    $lName = ucfirst($lName);

    //Hashing password for secure storage
    $passWord = password_hash($tempPass, PASSWORD_DEFAULT);
        
    //Creating the username from the given email address.
    $temp = $eMail;
    $array = explode('@', $temp);
    $uName = $array[0];

    $query = "INSERT INTO Users (firstName, lastName, userName, email, password, userType) VALUES ('$fName','$lName','$uName','$eMail','$passWord','$uType')";
    mysqli_query($con, $query);

    if (mysqli_errno($con) != 0) 
    {
        echo "User could not be added. Please try again.";
    } 
    else 
    {
        echo "You have successfully added $uName to the database.<br>";
    }
        
    mysqli_close($con);
?>