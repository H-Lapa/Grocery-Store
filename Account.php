<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes\navbar\navbar.css">
    <link rel="stylesheet" href="css/account.css">
    <title>Account</title>
</head>


<body>
    <?php include "includes/navbar/navbar.php"; ?>

    <div class="flex-k">
        <h2>Account Details</h2>
        <?php
        require 'includes/dbh.php'; //connects to db
        $y = $_SESSION['userid']; // setting the user id to the variable y 
        $query = sprintf('SELECT * FROM accounts WHERE UserID ='. $y); //sql which finds user record
        $result = mysqli_query($conn, $query); // connects sql to database
        while ($row = mysqli_fetch_assoc($result)) {
            //while loop, fetching the from the sql search
            echo "<span class='before'>Name:</span> ". $row['uuid'];
            echo "<span class='before'>Email: </span> ". $row['Email'];
            //presents the username and email of the user which is logged in
        }
        ?>
        <span class="before">Password: </span>
        <span>*******</span>
        <! -- this is to simulate the password being there, as we cannot know the length of the password because it is stored hashed-->

        <! -- this form is created to ammened account details, and connected to amendprocess.php-->
        <form action="includes/amendprocess.php" method="post">
        <! -- multiple input boxes for data entry-->
        <! -- all with their correlaiting name-->
            <div class="inputbox">
                <span>New Email:</span>
                <input type="email" name="email">
            </div>
            <div class="inputbox">
                <span>New Password:</span>
                <input type="password" name="password">
            </div>
            <div class="inputbox">
                <span>Repeat New password:</span>
                <input type="password" name="pass">
            </div>
        

        <?php
        $cum = sprintf('SELECT Ad FROM accounts WHERE UserID ='. $y); // sql to fetch user record
        $res = mysqli_query($conn, $cum); // connects sql statement to database
        $r = mysqli_fetch_assoc($res); // fetch function for the records
        if ($r['Ad'] === '1') {
            //if the column Ad in the record is 1 then it will show the admin panel button, as they are an admin
            echo '<br>';
            echo '<a style="color:blue;" href="AdminDash.php">Admin Panel</a>';
        }
        else {
            //if Ad is anything else they are not admins
        }
        ?>

        

        <button type="submit" class="out">Amend!</button> <! -- made to submit the form-->

        <a class="out" id="out" href="includes/logout.php">Log Out</a> <! -- logout button which links to the logout.php, which logs out the user from the account -->
         </form>
    </div>


</body>

</html>
