<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous">

    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/navbar/navbar.css">
    <link rel="stylesheet" href="css/product.css">
    
</head>


<body>
    <?php include "includes/navbar/navbar.php"; ?> <! -- connecting the html for the nav bar-->
    <?php
    //$var_value = $_SESSION['varname'];
    //echo $var_value;
    $id = $_GET["id"]; // the pid of the product is set
    $_SESSION['pid'] = $id;
    require 'includes/dbh.php'; // this file connects the file to the database
    $query = sprintf('SELECT * FROM produce WHERE pid ='. $id); // sql statement, to get product record
    $result = mysqli_query($conn, $query); // this connects the sql statement to the database
    $row = mysqli_fetch_assoc($result); // this fetches the result of the statement
    //echo $row['Name'];
    $Quantity = $row['Quantity'];
    ?>
    <! -- now all of the appropriate attributes are echoed into their places, to show the user the product details-->
    <title><?php echo $row['Name'] ?></title>
    <div class="flex-b">
        <h2><?php  echo $row['Name'] ?></h2>
        <img src="<?php echo $row['img'] ?>" alt="<?php echo $row['Name'] ?>">
        <span>Price: £<?php echo $row['Price'] ?></span>
    </div>

    <! -- this class is so it can be styled appropriatly in css easier-->
    <div class="inputBoxx">
    <! -- form which uses the file basketprocess.php and the method post-->
        <form action="includes/basketprocess.php" method="POST" name="basket">

            <span>Quantity:</span>

            <input type="integer" name="Qorder" placeholder="<?php echo '1 - '.$Quantity ?>">

            <button type="submit" name="basket"><i id="basket" class="fas fa-shopping-basket"></i></button>
            <! -- class on the button is a google icon-->
        </form>
    </div>
    
    
    <?php
    ini_set('display_errors',0);
    //this is so errors dont appear, this is because the code works but it has a technical error
    
    //checks if the session has a userid, if so it means the user is logged in
    if (isset($_SESSION['userid'])) {
        $sql = sprintf('SELECT Ad FROM accounts WHERE UserID ='. $_SESSION['userid']);
        $res = mysqli_query($conn, $sql);
        $r = mysqli_fetch_assoc($res);
        //this code above checks sets a sql query searching for the user that is logged in and connets -
        //to the accounts table and fetches data from it
        if ($r['Ad'] === '1') {
            //admin attribute from dtabase is checked to see if it is 1
            //if it is 1 then the person is an admin and the follow code should be shown
            echo '<br>';
            $quan = "SELECT * FROM sold WHERE pid = " . $row['pid'];
            //sql searching the sold table for all the instances of the product clicked
            $result = mysqli_query($conn, $quan);
            //connects to the database
            $sum = 0;
            //sum is being set as an integer
            $row = mysqli_fetch_assoc($result);
            //row is set to the fetch function
            $sum += $row['Quantity'];	
            //sum becomes the addition of all the quantity attributes
            echo '<span> Quantity Sold:  ' . $sum . '</span>';

            echo '<div class="flex-z">';
            echo '<form action="includes/productProcess.php" method="post">';
            echo '<span>New Name:</span>';
            echo '<input type="text" placeholder="Please use caps" name="name">';
            echo '<span>New Price:</span>';
            echo '<input type="text" placeholder="no need for £" name="price">';
            echo '<input type="hidden" name="pid" value=';
            echo $id;
            echo ">"; //id variable to get passed to productprocess.php was passed thrpugh a hidden input
            echo '<button id="changes">Submit</button>';
            echo '</form>';
            echo '</div>';
            
        }
        else {
            //if admin attribute is 0, it will show nothing as they are a regular user
        }
    }
    else {
        //if they are not logged in it wont show anything
    }
    ?>
    
</body>
</html>