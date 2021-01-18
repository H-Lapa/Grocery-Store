
<?php
    session_start(); // starts a session for the page
    require 'dbh.php'; //code which connects to the db
    $query = "SELECT * FROM cart WHERE UserID =" . $_SESSION['userid']; // sql to find records where the users id is present
    $result = mysqli_query($conn, $query); // executes sql statement
    while($row = mysqli_fetch_assoc($result)){
    //assigning of value to variable
    $val1 = $row['UserID'];
    $val2 = $row['pid'];
    $val3 = $row['Quantity'];
    //and so on

    $query2 = "INSERT INTO Sold (UserID,pid,Quantity) VALUES ('$val1', '$val2','$val3')"; // inserts all record with the users id from cart into sold table
    $result2 = mysqli_query($conn, $query2);// executes sql statement
    }
    $query3 = "DELETE FROM cart WHERE UserID =" . $_SESSION['userid']; //records deleted from cart which has the users id
    $result2 = mysqli_query($conn, $query3);// executes sql statement

    header("Location: ../index.php?"); //final destination


?>