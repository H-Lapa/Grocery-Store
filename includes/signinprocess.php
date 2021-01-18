<?php
//checks if the submit button has been clicked
if (isset($_POST['sign-in'])) {
    require 'dbh.php'; // connects to database

    //sets the info given before using post method into variables
    $uid = $_POST['username']; 
    $pass = $_POST['password'];

    //if the fields are empty then it takes the user back to the sign in page, with an error message in url
    if (empty($uid) || empty($pass)) {
        header("Location: ../signIn.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM accounts WHERE uuid=?;";
        $stmt = mysqli_stmt_init($conn);
        //if the statement isnt prepared correctly then an sql error appears
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signIn.php?error=sqlerror");
            exit();
        }
        else {
            //s in here represents a string
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                //this is an attempt to verify the password
                $pwdCheck = password_verify($pass, $row['Pass']);
                if ($pwdCheck == false) {
                    //if the verification is fale then the password is wrong
                    header("Location: ../signIn.php?error=wrongpassword");
                    exit();
                }
                elseif ($pwdCheck == true) {
                    //however if true then the log in is a success
                    session_start();
                    $_SESSION['userid'] = $row['UserID'];
                    $_SESSION['useruid'] = $row['uuid'];

                    //now the user is linked to the index page, with success in the url, confirming tthe log in
                    header("Location: ../index.php?login=success");
                    exit(); 
                }
                else {
                    header("Location: ../signIn.php?error");
                    exit();
                }
            }
            else {
                header("Location: ../signIn.php?error=nouser");
                exit();
            }
        }
    }

}
else {
    header("Location: ../signIn.php");
    exit();
} // the rest are just errors,so they link back to the sign in page with error in th url
?>  