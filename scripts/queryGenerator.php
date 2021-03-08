<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: queryGenerator.php
     * 
     * This function is called by search with the input array passed in the call.
First the keys of the input array are put into thier own array. These keys correspond 
with the column names in the database. Next is a switch statement with 9 cases 
for each possible number of search criteria entered. Each case builds a query 
that searches the database for criterion. These queries rely on subqueries nested 
in the FROM clause. The number of subquries is directly proportional to the number
of search criteria given. As the query executes it refines the search result with
every subquery, returning to the user a minimum set of costume pieces matching
the search criteria. Once the query is built it is returned to search.php. */

function queryGen($input)
{
    $keys = array_keys($input);

    switch (count($input))
    {
        case 1;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $query = "SELECT * FROM Piece WHERE $column0 = '$value0'";
            break;
            
        case 2;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $column1 = $keys[1];
            $value1 = $input[$keys[1]];
            
            $query = "SELECT * 
                      FROM (SELECT * 
                            FROM Piece 
                            WHERE $column0 = '$value0') AS temp
                      WHERE $column1 = '$value1'";
            break;
        
        case 3;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $column1 = $keys[1];
            $value1 = $input[$keys[1]];
            $column2 = $keys[2];
            $value2 = $input[$keys[2]];
            
            $query = "SELECT * 
                      FROM (SELECT * 
                            FROM (SELECT * 
                                  FROM Piece 
                                  WHERE $column0 = '$value0') AS temp
                            WHERE $column1 = '$value1') AS temp
                      WHERE $column2 = '$value2'";
            break;
            
        case 4;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $column1 = $keys[1];
            $value1 = $input[$keys[1]];
            $column2 = $keys[2];
            $value2 = $input[$keys[2]];
            $column3 = $keys[3];
            $value3 = $input[$keys[3]];
            
            $query = "SELECT * 
                      FROM (SELECT * 
                            FROM (SELECT * 
                                  FROM (SELECT * 
                                        FROM Piece 
                                        WHERE $column0 = '$value0') As temp
                                  WHERE $column1 = '$value1') AS temp 
                            WHERE $column2 = '$value2') AS temp
                      WHERE $column3 = '$value3'";
            break;
        
        case 5;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $column1 = $keys[1];
            $value1 = $input[$keys[1]];
            $column2 = $keys[2];
            $value2 = $input[$keys[2]];
            $column3 = $keys[3];
            $value3 = $input[$keys[3]];
            $column4 = $keys[4];
            $value4 = $input[$keys[4]];
            
            $query = "SELECT * 
                      FROM (SELECT * 
                            FROM (SELECT * 
                                  FROM (SELECT * 
                                        FROM (SELECT * 
                                              FROM Piece 
                                              WHERE $column0 = '$value0') AS temp 
                                        WHERE $column1 = '$value1') AS temp
                                  WHERE $column2 = '$value2') AS temp
                            WHERE $column3 = '$value3') AS temp
                      WHERE $column4 = '$value4'";
            break;
            
        case 6;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $column1 = $keys[1];
            $value1 = $input[$keys[1]];
            $column2 = $keys[2];
            $value2 = $input[$keys[2]];
            $column3 = $keys[3];
            $value3 = $input[$keys[3]];
            $column4 = $keys[4];
            $value4 = $input[$keys[4]];
            $column5 = $keys[5];
            $value5 = $input[$keys[5]];
            
            $query = "SELECT * 
                      FROM (SELECT * 
                            FROM (SELECT * 
                                  FROM (SELECT * 
                                        FROM (SELECT * 
                                              FROM (SELECT * 
                                                    FROM Piece 
                                                    WHERE $column0 = '$value0') AS temp
                                              WHERE $column1 = '$value1') AS temp
                                        WHERE $column2 = '$value2') AS temp
                                  WHERE $column3 = '$value3') AS temp
                            WHERE $column4 = '$value4') AS temp
                      WHERE $column5 = '$value5'";
            break;
        
        case 7;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $column1 = $keys[1];
            $value1 = $input[$keys[1]];
            $column2 = $keys[2];
            $value2 = $input[$keys[2]];
            $column3 = $keys[3];
            $value3 = $input[$keys[3]];
            $column4 = $keys[4];
            $value4 = $input[$keys[4]];
            $column5 = $keys[5];
            $value5 = $input[$keys[5]];
            $column6 = $keys[6];
            $value6 = $input[$keys[6]];
            
            $query = "SELECT * 
                      FROM (SELECT * 
                            FROM (SELECT * 
                                  FROM (SELECT * 
                                        FROM (SELECT * 
                                              FROM (SELECT * 
                                                    FROM (SELECT * 
                                                          FROM Piece 
                                                          WHERE $column0 = '$value0') AS temp 
                                                    WHERE $column1 = '$value1') AS temp
                                              WHERE $column2 = '$value2') AS temp
                                        WHERE $column3 = '$value3') AS temp
                                  WHERE $column4 = '$value4') AS temp
                            WHERE $column5 = '$value5') AS temp
                      WHERE $column6 = '$value6'";
            break;
        
        case 8;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $column1 = $keys[1];
            $value1 = $input[$keys[1]];
            $column2 = $keys[2];
            $value2 = $input[$keys[2]];
            $column3 = $keys[3];
            $value3 = $input[$keys[3]];
            $column4 = $keys[4];
            $value4 = $input[$keys[4]];
            $column5 = $keys[5];
            $value5 = $input[$keys[5]];
            $column6 = $keys[6];
            $value6 = $input[$keys[6]];
            $column7 = $keys[7];
            $value7 = $input[$keys[7]];
            
            $query = "SELECT * 
                      FROM (SELECT * 
                            FROM (SELECT * 
                                  FROM (SELECT * 
                                        FROM (SELECT * 
                                              FROM (SELECT * 
                                                    FROM (SELECT * 
                                                          FROM (SELECT * 
                                                                FROM Piece 
                                                                WHERE $column0 = '$value0') AS temp 
                                                          WHERE $column1 = '$value1') AS temp 
                                                    WHERE $column2 = '$value2') AS temp
                                              WHERE $column3 = '$value3') AS temp
                                        WHERE $column4 = '$value4') AS temp
                                  WHERE $column5 = '$value5') AS temp
                            WHERE $column6 = '$value6') AS temp
                      WHERE $column7 = '$value7'";
            break;
        
        case 9;
            $column0 = $keys[0];
            $value0 = $input[$keys[0]];
            $column1 = $keys[1];
            $value1 = $input[$keys[1]];
            $column2 = $keys[2];
            $value2 = $input[$keys[2]];
            $column3 = $keys[3];
            $value3 = $input[$keys[3]];
            $column4 = $keys[4];
            $value4 = $input[$keys[4]];
            $column5 = $keys[5];
            $value5 = $input[$keys[5]];
            $column6 = $keys[6];
            $value6 = $input[$keys[6]];
            $column7 = $keys[7];
            $value7 = $input[$keys[7]];
            $column8 = $keys[8];
            $value8 = $input[$keys[8]];
            
            $query = "SELECT * 
                      FROM (SELECT * 
                            FROM (SELECT * 
                                  FROM (SELECT * 
                                        FROM (SELECT * 
                                              FROM (SELECT * 
                                                    FROM (SELECT * 
                                                          FROM (SELECT * 
                                                                FROM (SELECT * 
                                                                      FROM Piece 
                                                                      WHERE $column0 = '$value0') AS temp 
                                                                WHERE $column1 = '$value1') AS temp 
                                                          WHERE $column2 = '$value2') AS temp 
                                                    WHERE $column3 = '$value3') AS temp
                                              WHERE $column4 = '$value4') AS temp
                                        WHERE $column5 = '$value5') AS temp
                                  WHERE $column6 = '$value6') AS temp
                            WHERE $column7 = '$value7') AS temp
                      WHERE $column8 = '$value8'";
            break;
    }
    return $query;
}