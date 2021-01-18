<?php
//starting a session
session_start();
//retreiving the variables from the form
$id = $_SESSION['userid'];

//function email si for an email check
function email($email, $id){
    if ($email == null) {
        //if the field is empty nothing happens
        //the data is verified to be an email using html, making sure it has an '@'
    }
    else {
        require 'dbh.php'; //connecting to db
        $sql = "UPDATE accounts SET Email='$email' WHERE UserID=" . $id; //sql to update the record details
        mysqli_query($conn, $sql); // executes the sql statement 
    }

}

//funnction pass if for password check
function pass($pass, $rpass, $id){
    require 'dbh.php';//connecting to db
    if ($pass == $rpass) {
        //if the two passwords written match then...
        $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
        //the new password is hashed into the variable $hashedpass
    
        $sql = "UPDATE accounts SET Pass='$hashedpass' WHERE UserID=" . $id;
        //sql statemet to update the account record password
        mysqli_query($conn, $sql); // executes the sql statement
    }
    else {
        echo "Passwords dont match";
    }

}

//this is where the functions are executed and the parameters are put into place
email($_POST['email'], $id);
pass($_POST['password'] , $_POST['pass'], $id);

//header("Location: ../index.php?")



?>