<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous">

	</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/navbar/navbar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/AdminProducts.css">
	<title>Document</title>
</head>

<body>
	<?php include "includes/navbar/navbar.php"; //html for the naviagtion bar ?>

    <div class="sidenav"> <! -- html for the admin panel navigation bar-->
        <a>Dashboard</a>
        <a href="#services">Products</a>
        <a href="#clients">Addition</a>
    </div>

	<div id="arranging">
    <?php
    require 'includes/dbh.php'; //connects to the database
    $query = sprintf('SELECT * FROM produce');
	$result = mysqli_query($conn, $query);
	//$var_value = 'hello';
	//$_SESSION['varname'] = $var_value;
    while ($row = mysqli_fetch_assoc($result)) { 
		if ($row['Quantity'] == 0) {

		}
		else {
    ?>
	<div class="itemTemplate">
		<a id="title" onclick="ContentPage(<?php echo $row['pid']; ?>)"><?php echo $row['Name'] ?></a>
		<a onclick="ContentPage(<?php echo $row['pid']; ?>)" id="myid"><img src="<?php echo $row['img'] ?>" alt="<?php echo $row['Name'] ?>"></a>
		<span>Price: £<?php echo $row['Price'] ?></span>
		<form action="includes/quickBasket.php" method="POST">
		<div class="flex-b">
			<label for="">Sold:</label>
				<?php
				$quan = "SELECT * FROM sold WHERE pid = " . $row['pid'];
				$res = mysqli_query($conn, $quan);
				$sum = 0;
				while ($row = mysqli_fetch_assoc($res)){
					$sum += $row['Quantity'];
				}
				
				echo $sum;
				$sum = 0;
				?>


			<input type="hidden" name="pid" value="<?php echo $row['pid']; ?>"/>
			<a href="" id="triangle" class="fas fa-triangle"></a>
		</div>
		</form>
    </div>
	<?php
	} 
}
    ?>

	</div>

<script>
function ContentPage(elem){
    location.href = "Product.php" + "?id=" + elem;
};
</script>

</body>
</html>