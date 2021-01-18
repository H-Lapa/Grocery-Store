<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/navbar/navbar.css">
	<link rel="stylesheet" href="css/cart.css">
    <title>Document</title>
</head>

<body><! -- this is the side table html code-->
<table id="table">
        <tr>
            <th>Item ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>PQ</th>
        </tr>
    <?php 
    include "includes/navbar/navbar.php"; // includes navbar html
    require 'includes/dbh.php'; //connects to databse
    $id = $_SESSION['userid']; // sets userid equal to variable id

    $query = sprintf('SELECT * FROM cart WHERE UserID ='. $id); // sql, finds all the records for the speific user
    $result = mysqli_query($conn, $query); // connects the sql to the dtaabase

    function price($pid) { //function name price is being set, with parameters of the product pid
        require 'includes/dbh.php'; // connection to the database
        $query2 = sprintf('SELECT * FROM produce WHERE pid='. $pid); //sql, to find the product using the pid / product number
        $result2 = mysqli_query($conn, $query2);// connects sql to the database
        $row2 = mysqli_fetch_assoc($result2);// fetch function to get item from the database
        return $row2['Price'];
        //fetches the price from the result
    }

    function name($pid) {
        require 'includes/dbh.php'; // connection to the database
        $query2 = sprintf('SELECT * FROM produce WHERE pid='. $pid);
        //sql, to find the product using the pid / product number
        $result2 = mysqli_query($conn, $query2); // connects sql to the database
        $row2 = mysqli_fetch_assoc($result2); // fetch function to get item from the database
        return $row2['Name'];
        //fetches the name from the result
    }

    $total = 0; // set the variable total as an integer

    if (mysqli_num_rows ( $result ) > 0) { 
        // checks there is more than 0 items 
        //if so it executes the while loop
        while ($row = mysqli_fetch_assoc($result)) {
            //this loop repeats for every record, which is linked to the user id
            $name = name($row['pid']); // set name variable
            $price = price($row['pid']); // set price variable
            // both set using the previous functions
            $tally = $price * $row['Quantity']; // combination of price and the quantity
            echo "<tr><td>" . $row['pid'] . "</td><td>" . $name . "</td><td>£" . $price . "</td><td>".   $row['Quantity'] . "</td><td>£" .  $tally  ."</td></tr>";
            //this is a table which reapeats for every record in the table
            $total = $total + $tally;
            //while the loop is happening total is being counted, into the total variable
        }
    }
    else {
        echo "No Items in your Basket";
        //if the number of items is 0 then a mesage saying no items appears
    }
    ?>
    
    </table>
    <span><strong>Total:</strong>£ <?php echo $total;  ?></span> <! -- total variable is used to show the total amount of money to be spent-->
    <a href="includes/processPurchase.php">Buy!</a> <! -- this is the buy button which links to process purchase.php-->

    
</body>
</html>