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
      if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper username!</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
      }
      
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
      }
    }
  ?>
  </div>
  <!-- <?php
        include_once 'sidebar.php';
  ?> -->

  
  
</section>


