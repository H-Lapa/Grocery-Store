<?php
session_start();
require 'dbh.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $img = $_FILES['image']['name'];
    $price = $_POST['price'];

    $insert = "insert into produce values ('NULL', '$name','images/ $name .png', '$price', '0')";
    if (mysqli_query($conn, $insert)) {
        move_uploaded_file($_Files['image']['temp_name'], "Images/$img" );
        echo "has been uploaded to folder";
    }
}


?>