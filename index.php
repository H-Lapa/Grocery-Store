<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous">

	</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/navbar/navbar.css"> <! -- this is so the navbar can gets its appropiate style-->
	<link rel="stylesheet" href="css/style.css">
	<title>Index</title>
</head>

<body>
	<?php include "includes/navbar/navbar.php"; ?>
	<! -- this when loaded into a browser just puts the html code from the navbar file-->
	<div id="arranging">
    <?php
	require 'includes/dbh.php';
	//this is php code which is repeatedly used so it is imported into many files
	//it allows the code to connect to the databases
	$query = sprintf('SELECT * FROM produce'); 
	// this is an sql statement to search for all the rows in the table produce and set to the variable query
	$result = mysqli_query($conn, $query);
	//result variable connects the query to the database

	//while loop to go through all the items found in the table
	//row is set to a fetch from database function, allowing the code to choose which ite from the row it wants to select
    while ($row = mysqli_fetch_assoc($result)) { 
		if ($row['Quantity'] == 0) {
			//if the quantity of the product is 0, it will not be shown for the consumer to buy
			//so the output is nothing
		}
		else {
			//but if there is more than 1 of the product in stock it will follow this template for the item
    ?>
	<div class="itemTemplate"> <! --this is the item template that it repeated for every item which is in the database -->
		 <! -- the onclick function is a javascript function shown below, which links the title and image to the product page -->
		 <! -- the rest are variables from the database being shown-->
		 <! -- the image is a link to the images folder and the png images and not stored directly in the database-->
		<a id="title" onclick="ContentPage(<?php echo $row['pid']; ?>)"><?php echo $row['Name'] ?></a>
		<a onclick="ContentPage(<?php echo $row['pid']; ?>)" id="myid"><img src="<?php echo $row['img'] ?>" alt="<?php echo $row['Name'] ?>"></a>
		<span>Price: £<?php echo $row['Price'] ?></span>
		<! -- this is the bottom of the item template, it is a form which adds to the basket-->
		<form action="includes/quickBasket.php" method="POST">
		<div class="flex-b">
			<label for="">Quantity:</label>
			<select name="quantity">
				<?php
				//this creates how many options is in the drop down menu
				//the if statement determines if the quantity is larger than 8,
				//as we want the menu to show a maxximum of 8 
				
				if ($row['Quantity'] > 8) {
					for ($x = 1; $x <= 8; $x++) {
						echo "<option value='$x'>$x</option>";
					  }
				}
				//if less than 8 then it will only show up to how much is in stock
				else {
					for ($x = 1; $x <= $row['Quantity']; $x++) {
						echo "<option value='$x'>$x</option>";
					  }
				}
				?>
				
			</select>
			<! -- this hidden input, allows for the variable that represents the rpoduct to be transfered to the processing page-->
			<input type="hidden" name="pid" value="<?php echo $row['pid']; ?>"/>
			<! -- this is the input button-->
			<button id="button" type="submit" name="cart" class="fas fa-shopping-basket"></button>
		</div>
		</form>
    </div>
	<?php
	} 
}
    ?>

	</div>
	<! -- this javascript, allows for the idof the item to be transfered to the next page -->
	<! -- this is necessary because we need to know which item to present the user with-->
<script>
function ContentPage(elem){
    location.href = "Product.php" + "?id=" + elem;
};
</script>

</body>
</html>