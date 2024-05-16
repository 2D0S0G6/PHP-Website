<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $host = 'localhost';
    $username = 'blockchain';
    $password = 'password';
    $database = 'blockchain';
    
    $con = mysqli_connect($host, $username, $password, $database);
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
