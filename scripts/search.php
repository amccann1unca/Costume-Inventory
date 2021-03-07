<?php
    /* Recieves input from searchInput.php. First the script builds an array that
represents the search the user wants performed. This done by checking each form 
input for being empty. If it is empty it is skipped and if it is not it is added
to the array mentioned before. In the array the keys directly represent the column
in the database and the data corresponds with that key. Once the array is built,
a helper script, named query generator, is called. The function that makes up this
script receives the input array and generates the exact query neccessary to search
the database. The result of this query is returned and then row by row is displayed
in a table to the user. The user is able to download a CSV file of the search just
performed. As the table is created for display, an array for the CSV is also being
built. This array is sent to a script named report.php where the file name and
output array are used to create an automatic download for the CSV file. */

    session_start();
    
    session_regenerate_id();
    
    include("header.php");
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
        include("queryGenerator.php");
        require_once ("config.php");
        
        if (isset($_REQUEST['checkout']))
        {
            $input['checkedOut'] = mysqli_real_escape_string($con, $_REQUEST['checkout']);
        }
        else
        {
            die("You must select whether to look at available or checked out pieces.");
        }
    
        if ($_REQUEST['id'] != "") 
        {
            $input['pieceID'] = mysqli_real_escape_string($con, $_REQUEST['id']);
        }
        if ($_REQUEST['title'] != "") 
        {
            $input['title'] = mysqli_real_escape_string($con, $_REQUEST['title']);
        }
        if ($_REQUEST['type'] != "") 
        {
            $input['type'] = mysqli_real_escape_string($con, $_REQUEST['type']);
        }
        if ($_REQUEST['time'] != "") 
        {
            $input['timePeriod'] = mysqli_real_escape_string($con, $_REQUEST['time']);
        }
        if ($_REQUEST['body'] != "") 
        {
            $input['bodyType'] = mysqli_real_escape_string($con, $_REQUEST['body']);
        }
        if ($_REQUEST['size'] != "") 
        {
            $input['size'] = mysqli_real_escape_string($con, $_REQUEST['size']);
        }
        if ($_REQUEST['material'] != "") 
        {
            $input['material'] = mysqli_real_escape_string($con, $_REQUEST['material']);
        }
        if ($_REQUEST['color'] != "") 
        {
            $input['color'] = mysqli_real_escape_string($con, $_REQUEST['color']);
        }
    
        $query = queryGen($input);
        $result = mysqli_query($con, $query);
        mysqli_close($con);
        ?>
        
        <h2>Search Results</h2>
        <br>
        
        <table border="0" cellspacing="2" cellpadding="2">
            <tr> 
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Time Period</th>
                <th>Body Type</th>
                <th>Size</th>
                <th>Material</th>
                <th>Color</th>
                <th>Checked Out</th>
            </tr>

            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) 
            {
                $id = $row['pieceID'];
                $title = $row['title'];
                $type = $row['type'];
                $time = $row['timePeriod'];
                $body = $row['bodyType'];
                $size = $row['size'];
                $material = $row['material'];
                $color = $row['color'];
                if ($row['checkedOut'] == 0)
                {
                   $checkOut = 'No'; 
                }
                else
                {
                    $checkedOut = 'Yes';
                }
                $output[$i]['pieceID'] = $row['pieceID'];
                $output[$i]['title'] = $row['title'];
                $output[$i]['type'] = $row['type'];
                $output[$i]['timePeriod'] = $row['timePeriod'];
                $output[$i]['bodyType'] = $row['bodyType'];
                $output[$i]['size'] = $row['size'];
                $output[$i]['material'] = $row['material'];
                $output[$i]['color'] = $row['color'];
                if ($row['checkedOut'] == 0)
                {
                    $output[$i]['checkedOut'] = 'No'; 
                }
                else
                {
                    $output[$i]['checkedOut'] = 'Yes';
                }
                ++$i;
            ?>

                <tr> 
                    <td><?php echo "$id"; ?></td>
                    <td><?php echo "$title"; ?></td>
                    <td><?php echo "$type"; ?></td>
                    <td><?php echo "$time"; ?></td>
                    <td><?php echo "$body"; ?></td>
                    <td><?php echo "$size"; ?></td>
                    <td><?php echo "$material"; ?></td>
                    <td><?php echo "$color"; ?></td>
                    <td><?php echo "$checkOut"; ?></td>
                </tr>
            <?php
            }
            $_SESSION['output'] = $output;
            ?>
        </table>
        <br>
        <form action="report.php" method="post">
            <h2>To save this search click Save</h2>
            <u><b>File Name:</b></u> <input type="text" name="fileName" required>
            <input type="submit" name="report" value="Save">
        </form>
    </body>
</html>