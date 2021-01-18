<?php
//ini_set('display_errors',0);
session_start(); // session has been started
require 'dbh.php'; // file conencts to the database

//setting variables, received via POST method from a form
$nName = $_POST['name'];
$nPrice = $_POST['price'];
$pid = $_POST['pid'];

if ($nName == null) {

}
else {
    $sql = "UPDATE produce SET Name='$nName' WHERE pid=" . $pid;
    mysqli_query($conn, $sql);
}

if ($nPrice == null) {

}
else {
    $sql = "UPDATE produce SET price='$nPrice' WHERE pid=" . $pid;
    mysqli_query($conn, $sql);
}

header("Location: ../index.php?");



?>