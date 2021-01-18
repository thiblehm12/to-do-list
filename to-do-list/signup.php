<?php
  include_once 'header.php';
?>

<section class="signup-form">
  <!-- <h2>Sign Up</h2>
  <div class="signup-form-form">
    <form action="includes/signup.inc.php" method="post">
      <input type="text" name="uid" placeholder="Username...">
      <input type="text" name="email" placeholder="Email...">
      <input type="password" name="pwd" placeholder="Password...">
      <button type="submit" name="submit">Sign up</button>
    </form>
  </div> -->
  
  <div class="login-box">
    <h2>Register</h2>
    <form action="includes/signup.inc.php" method="post">
      <div class="user-box">
        <input type="text" name="uid" placeholder="Username...">
        
      </div>
      <div class="user-box">
        <input type="text" name="email" placeholder="Email...">
        
      </div>
      <div class="user-box">
        <input type="password" name="pwd" placeholder="Password...">
        
      </div>
      <button id="btn" type="submit" name="submit">Sign up</button>

      
    </form>
    <?php
    // Error messages
      if (isset($_GET["error"])) { //We do a serie of test to be sure that the informations are valid and everything is check grom the url
      if ($_GET["error"] == "emptyinput") { // We check if shtg is entered 
        echo "<p>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "invaliduid") { // if the username is valid
        echo "<p>Choose a proper username!</p>";
      }
      else if ($_GET["error"] == "invalidemail") { // if the email is valid
        echo "<p>Choose a proper email!</p>";
      }
      
      else if ($_GET["error"] == "stmtfailed") {  //shtg that we don't know
        echo "<p>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "usernametaken") { //if the username is already used
        echo "<p>Username already taken!</p>";
      }
      else if ($_GET["error"] == "none") { //else everithyng is good so u are signed up
        echo "<p>You have signed up!</p>";
      }
    }
  ?>
  </div>
  
  
  
</section>


