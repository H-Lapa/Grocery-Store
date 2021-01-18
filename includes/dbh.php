<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // this is so all errors are reported 

//setting the variable strings
$servername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'store';

//$conn is set to the mysqli function to connect to the database
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    //if statement determines if the $conn variable is valid
    die("Connection failed:".mysqli_connect_error());
}

?>