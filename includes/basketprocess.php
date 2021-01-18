<?php
session_start(); //starting a session

//finding the session variables
echo $_SESSION['pid']; //product id
echo $_SESSION['userid']; // user id

require "dbh.php";// connecting to the db

$Qorder = $_POST['Qorder']; // quantity of good as a variable

//setting session values to variables
$a = $_SESSION['userid'];
$x = $_SESSION['pid'];

if (empty($Qorder)) {
    //if qorder is empty
    //then it assumes you only want to add a quantity of 1 
    //reassigning the value of the variable to 1 
    $Qorder = 1;
}

//if stament to check if you are logged in 
if (isset($a)) {
    echo "you're logged in";
    $sql = "INSERT INTO cart (UserID, pid, Quantity) VALUES ($a, $x, $Qorder)"; //sql to insert new order record into the cart table
    if(mysqli_query($conn, $sql)){ //executes the sql statement in the if statement
        header("Location: ../index.php?");
        //redirects to the index page
        echo "Records inserted successfully.";
    } else{
        //if it doesnt execute the statement, error message
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    }
else {
    header("Location: ../register.php");
}


?>