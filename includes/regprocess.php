<?php
if (isset($_POST['sign-up'])) {
    require 'dbh.php'; // this connect to the database

    //this sets the inputs from the form into variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    //if they are all empty they stay on the same page but the url gets an error
    if (empty($username) || empty($email) || empty($password)) {
        header("Location: ../register.php?error=emptyfields&username=".$username. "&email=".$email);
        exit();

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) { 
        // this is email validation and username
        header("Location: ../register.php?error=invalidemail&username");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //here the email is invalid but the username is kept
        header("Location: ../register.php?error=invalidemail&username=".$username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        //here the usernameis invalid but the email is kept
        header("Location: ../register.php?error=invalidusername&email=".$email);
        exit();
    } else {
        $sql = "SELECT uuid FROM accounts WHERE uuid =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            //this happens if there is an error with the sql statement
            header("Location: ../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                //email is correct but the username used is already taken
                header("Location: ../register.php?error=usernametaken&email=".$email);
                exit();
            } else {
                $sql = "INSERT INTO accounts(uuid, Email, Pass) ValUES(?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    //if this happens there is an error with the sql statement
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpass = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpass);
                    mysqli_stmt_execute($stmt);
                    //this happens when all the values from the form are valid
                    header("Location: ../register.php?register=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../register.php");
    exit();
}// exit closes the connection to the database