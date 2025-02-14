<?php
    $servername = "localhost";  // Adjust as necessary
    $username = "root";         // Adjust as necessary
    $password = "";             // Adjust as necessary
    $dbname = "test_db";        // Database name

    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$con) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
