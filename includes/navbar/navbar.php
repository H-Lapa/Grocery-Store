<?php
	session_start();
?>

<body>
<! -- This creates the navigation bar subdivision -->
    <nav>
        <div class="flex-c"> <! -- Using a class makes it easier to identify the items within -->
          <a href="index.php">
            <i class="fas fa-carrot"></i> <! -- This class is the google font, so it produces an image of a carrot which is supposed to be the logo -->
          </a>
          <a href="index.php">District 1</a>
        </div><! --these items need ot be next to each other, so making a division with only them makes it easier, plus the href means they link to the same page -->
        <div>
          <a href=""><i class="fas fa-search"></i></a><! -- this clss if the google font ehich produces a search bar-->
          <input type="text">
        </div>
        <! -- here is where the account buttn or sign in button appears -->
        <?php
        // this is an if statement questioning whether someone has already logged in
          if (isset($_SESSION['userid'])) {
            echo '<a href="Account.php"><i class="fas fa-user-circle"></i></a>';
            //if they are logged in they show the account icon with the link to the account page
          }
          else {
            echo '<a href="signIn.php"><i class="fas fa-sign-in-alt"></i></a>';
            //if they are not logged in they will get a sign in icon and it will be linked too the sign up page
          }
          
        ?>
        <!--<a href=""><i class="fas fa-sign-in-alt"></i></a>-->
    
        <a href="
        <?php
        // this if stement determines where the cart button is linked to
          if (isset($_SESSION['userid'])) {
            echo "cart.php";
            //if they are logged in they get sent to cart.php
          }
          else {
            echo "register.php";
            // if they are not logged in they are sent to register php, as they cant have a cart without an account
          }
        ?>
        "><i class="fas fa-shopping-cart"></i></a>
    
      </nav>
</body>