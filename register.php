<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/navbar/navbar.css">
    <link rel="stylesheet" href="css/sigreg.css">
    <title>Document</title>
</head>

<body>
    <?php include "includes/navbar/navbar.php";?> <! -- this php code links the nav bar html to the page -->
    <div class="flex-c"> <! -- division for the whole thing make it easier in css-->
        <form action="includes/regprocess.php" method="POST" name="sign-up"> <! -- links the submit button to regprocess.php-->
            <h2>register</h2>
            <div class="inputBoxx"><! -- input boxes to put in details for the form processor-->
                <span>username</span>
                <input type="text" name="username">
            </div>
            <div class="inputBoxx">
                <span>email</span>
                <input type="email" name="email" placeholder="email@xyz.com">
            </div>
            <div class="inputBoxx">
                <span>password</span>
                <input type="password" name="pass" placeholder="">
            </div>
            <button type="submit" name="sign-up">sign up</button><! -- this is the submit button -->
        </form>
    </div>
</body>

</html>