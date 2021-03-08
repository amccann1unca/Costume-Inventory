<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: insert.php
     * 
     * Recieves user input from insertInput.php. First the inputs for type, body 
type, material, and color are formatted to have the first letter upper case. Color
is checked for spaces and all of them are removed. Next inputs time period and 
size are formatted. Any letters in them are forced to uppercase and any spaces 
are removed. Then time period, type, size, material, and color are used are used
to create an identifier that is unique as possible and can be used in the 
physical world. Next we search for the new pieceID in the database, if it already
exists a random 3 digit number is added to the end. Then this searched for in the database, if it
exists a new pieceID is made and the new id is searched for again. Otherwise, the
piece is added to the database via an INSERT query. */

    session_start();
    
    session_regenerate_id();
    
    include("header.php");
?>
<!DOCTYPE html>
<html>
    <body>
        <?php

        require_once ("config.php");

        $title = mysqli_real_escape_string($con, $_REQUEST['title']);
        $type = mysqli_real_escape_string($con, $_REQUEST['type']);
        $time = mysqli_real_escape_string($con, $_REQUEST['time']);
        $body = mysqli_real_escape_string($con, $_REQUEST['body']);
        $size = mysqli_real_escape_string($con, $_REQUEST['size']);
        $material = mysqli_real_escape_string($con, $_REQUEST['material']);
        $color = mysqli_real_escape_string($con, $_REQUEST['color']);
        
        //Formats $type, $body, $material, and $color to be of the form "Red"
        $type = strtolower($type);
        $type = ucfirst($type);
        $body = strtolower($body);
        $body = ucfirst($body);
        $material = strtolower($material);
        $material = ucfirst($material);
        //Removes any spaces in color
        $color = str_replace(" ", "", $color);
        $color = strtolower($color);
        $color = ucfirst($color);
        
        //Formats $size so that any letters are uppercase and any spaces are removed
        $size = strtoupper($size);
        $size = str_replace(" ", "", $size);
        
        //Formats $time so that any letters are uppercase and any spaces are removed
        $time = strtoupper($time);
        $time = str_replace(" ", "", $time);

        //Creating the pieceID
        //This id is meant to be used in the real world to quickly ID a costume piece
        $id = $time . $type . $size . $material . $color;

        $query1 = "SELECT pieceID FROM Piece WHERE pieceID = '$id'";
        $result = mysqli_query($con, $query1);
        $row = mysqli_fetch_array($result);

        if ($row[0] == $id)
        {
            $id = $time . $type . $size . $material . $color . rand(0, 999);
        }

        $query2 = "INSERT INTO Piece (pieceID, title, type, timePeriod, bodyType, size, material, color) VALUES ('$id','$title','$type','$time','$body','$size','$material','$color')";
        mysqli_query($con, $query2);

        if (mysqli_errno($con) != 0) 
        {
            echo "Addition failed.\nNavigate back to the Add tab via navigation bar and try again.";
        } 
        else 
        {
            echo "You have successfully added $title to the database.<br>";
        }

        mysqli_close($con);

        ?> 
    </body>
</html>