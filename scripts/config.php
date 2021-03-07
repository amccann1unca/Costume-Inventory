<?php
    /* Holds the login information for connecting to the database and creates 
the connection to the database. */

$host="unca-csci.net";
$username="uncacsci_amccann1";
$password=">kA4a}tn";
$database="uncacsci_amccann1";

$con = mysqli_connect($host, $username, $password, $database)
        or die("Unable to connect to database" . mysqli_connect_error());

if (mysqli_connect_errno($con)) 
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>