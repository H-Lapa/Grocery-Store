<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous">

	</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/navbar/navbar.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Document</title>
</head>

<body>
	<?php include "includes/navbar/navbar.php"; ?>
	<div id="arranging">
    <?php
    require 'includes/dbh.php';
    $query = sprintf('SELECT * FROM produce');
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) { 
    ?>
	<div class="itemTemplate">
		<a id="title" href="register.php"><?php echo $row['Name'] ?></a>
		<a href=""><img src="<?php echo $row['img'] ?>" alt="<?php echo $row['Name'] ?>"></a>
		<span>Price: £<?php echo $row['Price'] ?></span>
		<div class="flex-b">
			<label for="">Quantity:</label>
			<select name="" id="">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
			</select>
			<a href="signIn.php"><i class="fas fa-shopping-basket"></i></a>
		</div>
    </div>
    <?php 
        }
    ?>

	</div>

</body>
</html>