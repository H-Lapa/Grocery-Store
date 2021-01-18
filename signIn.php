<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://kit.fontawesome.com/9114d9acc8.js" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/navbar/navbar.css">
	<link rel="stylesheet" href="css/sigreg.css">
	<title>Sign in</title>

</head>

<body>
	<?php include "includes/navbar/navbar.php"; ?> <! -- this transfers the code for the navigation bar -->
	<div class="flex-c"> <! -- this class is the whole  -->
		<form action="includes/signinprocess.php" method="POST">
			<h2>login</h2>
			<div class="inputBoxx">
			<! -- username and password inputs-->
				<span>username</span>
				<input type="text" name="username">
			</div>
			<div class="inputBoxx">
				<span>password</span>
				<input type="password" name="password" placeholder="">
			</div>
			<button type="submit" name="sign-in">sign in</button> <! -- sign in button-->
			<div class="forget">
				<a href="">Forgot password?</a> <! -- this needs to be updated withsome sort of link, as it currently has no function -->
				<span id="NR">Not registered yet?</span></span> 
				<a href="register.php">Register here</a> <! -- goes to the register page -->
			</div>
		</form>
	</div>

	<?php
	//this was made for testing, as the action file for the form links back to the sign in page
	if (isset($_SESSION['userid'])) {
		//this checks if a session userid has been set, if so it determines the user is logged in
		//so it shows text saying you are logged in and provides a log out button
		echo '<p>You are logged in</p>';
		echo '<a id="out" href="includes/logout.php" style="color:black;">Log Out Btn</a>';
	}
	else {
		echo '<p>You are logged out</p>';
	}
	
	?>
</body>

</html>