<?php
session_start();
require 'dbh.php';
$Qorder = $_POST['quantity'];

$pid = $_POST["pid"];
$a = $_SESSION['userid'];

if (isset($a)) {
    echo "you're logged in";
    $sql = "INSERT INTO cart (UserID, pid, Quantity) VALUES ($a, $pid, $Qorder)";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?");
}

else {
    header("Location: ../register.php?");
}
?>