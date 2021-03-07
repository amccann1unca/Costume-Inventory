<?php
    /* Receives user data from updateUserInput.php. Takes this information and
searches the database for the user information given. Once the user is found, the keys of
the input array are examined to determine which case of a switch statement is to
be taken. The cases are for changing the users email, password, or user type.
Each case utilizes an UPDATE statement to change the user's data. */

    session_start();
    
    session_regenerate_id();
    
    include("header.php")
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
        
        require_once ("config.php");
        
        $fName = mysqli_real_escape_string($con, $_REQUEST['firstName']);
        $lName = mysqli_real_escape_string($con, $_REQUEST['lastName']);
        $uName = mysqli_real_escape_string($con, $_REQUEST['username']);
        $uType = mysqli_real_escape_string($con, $_REQUEST['userType']);
        
        if ($_REQUEST['email'] != "") 
        {
            $input['email'] = mysqli_real_escape_string($con, $_REQUEST['email']);
        }
        if ($_REQUEST['password'] != "") 
        {
            $pass = mysqli_real_escape_string($con, $_REQUEST['password']);
            $input['pass'] = password_hash($pass, PASSWORD_DEFAULT);
        }
        if ($_REQUEST['userType2'] != "") 
        {
            $input['newType'] = mysqli_real_escape_string($con, $_REQUEST['userType2']);
        }
        
        $query = "SELECT userID FROM User WHERE firstName = '$fName' AND userName = '$uName' AND userType = '$uType';";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        
        if (mysqli_errno($con) != 0) 
        {
            echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
        }
        
        if (row[0] == "")
        {
            echo "Unable to find user";
            die;
        }
        else
        {
            $keys = array_keys($input);
            $user = $row[0];
            
            switch ($keys[0])
            {
                case 'email';
                    $key = $keys[0];
                    $query1 = "UPDATE User SET email = '$input[$key]' WHERE userID = '$user'";
                    mysqli_query($con, $query1);
                    if (mysqli_errno($con) != 0) 
                    {
                        echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
                    } 
                    else 
                    {
                        echo "You have successfully updated the email for $uName.";
                    }
                    break;
                
                case 'pass';
                    $key = $keys[0];
                    $query1 = "UPDATE User SET password = '$input[$key]' WHERE userID = '$user'";
                    mysqli_query($con, $query1);
                    if (mysqli_errno($con) != 0) 
                    {
                        echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
                    } 
                    else 
                    {
                        echo "You have successfully updated the password for $uName.<br>";
                    }
                    break;
                
                case 'newType';
                    $key = $keys[0];
                    $query1 = "UPDATE User SET userType = '$input[$key]' WHERE userID = '$user'";
                    mysqli_query($con, $query1);
                    if (mysqli_errno($con) != 0) 
                    {
                        echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
                    } 
                    else 
                    {
                        echo "You have successfully updated the user type of $uName.<br>";
                    }
                    break;
            }
        }
        ?>
    </body>
</html>