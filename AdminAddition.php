<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="includes/navbar/navbar.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="Addition.css">
    <title>Document</title>
</head>
<body>
	<?php
	include "includes/navbar/navbar.php"; // includes the navigation bar html
	
	?>
	<div class="sidenav"> <! -- the side bar html is here for admin panel naviagtion-->
        <a>Dashboard</a>
        <a href="AdminProducts.php">Products</a>
        <a href="AdminAddition.php">Addition</a>
	</div>
	
<form method="POST" action="includes/Addition.php" enctype="multipart/form-data" class="felx-h">
<! -- this is a form to upload new products-->
	  <input type="hidden" name="size" value="1000000">
	  <input type="text" placeholder="Name?" name="name">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
	  <textarea 
      	name="price" 
      	placeholder="Price?"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
</form>

</body>
</html>