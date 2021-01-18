<?php
  include_once 'header.php';
?>

<section class="signup-form">
  <div class="login-box">
      <h2>Log in</h2>
      <form action="includes/login.inc.php" method="post">
      <div class="user-box">
        <input type="text" name="uid" placeholder="Username/Email...">
        
      </div>
      <div class="user-box">
        <input type="password" name="pwd" placeholder="Password...">
        
      </div>
      <button id="btn" type="submit" name="submit">Log in</button>

      
    </form>
  <?php
    // Error messages
    if (isset($_GET["error"])) { //we do different test to be sure that the user enter the right informations
      if ($_GET["error"] == "emptyinput") { //if sthg is entered
        echo "<p>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "wronglogin") { //if the login is equal to the password
        echo "<p>Wrong login or password!</p>";
      }
    }
  ?>
<!-- <?php
  include_once 'footer.php';
?> -->


</section>

