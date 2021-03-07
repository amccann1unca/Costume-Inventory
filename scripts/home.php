<?php
    /*The home is the second page the user sees. It welcomes the user and gives
a few guidelines for using the website.*/

    session_start();
    
    session_regenerate_id();
    
    include("header.php");
    
    echo "Hi, " . $_SESSION['userFName'] . ". You have successfully logged in." .
         "<br>Depending on the user type assigned to you, " .
         "you will see a unique navigation bar above." .
         "<br>This ensures that only authorized users have access to certain functions." .
         "<br>Do not use the refresh button unless absolutley necessary." .
         "<br>This website utilizes cookies. If you have cookies disabled the website may not work correctly.";
?>