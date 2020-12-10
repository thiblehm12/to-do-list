<?php
  session_start();
  include_once 'includes/functions.inc.php';
  $page = strrchr($_SERVER['SCRIPT_NAME'], '/');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
          <?php
              if ($page == '/login.php'){
                echo 'Login';
              } else {
                echo 'Signup';
              }
          ?>
    </title>
    <!--I won't do more than barebone HTML, since this isn't an HTML tutorial.-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
  </head>
  <body>

    <!--A quick navigation-->
    
      <div class="navbar">
        <!-- <a href="index.php"><img src="images/logo1.png" alt="thibaut" width="100px"></a> -->
        <img src="images/logo2.png" onclick="redirect3()" class="logo">
        <ul>
          
          <?php
            if (isset($_SESSION["useruid"])) {
              echo "<li><a href='index.php'>To-do List</a></li>";
              echo "<li><a href='logout.php'>Logout</a></li>";
            }
            else {}
          ?>
        </ul>
        
        
        
            <?php
              if ($page == '/login.php'){
                echo '<button id="btn" type="button" onclick="redirect()">Sign Up</button>';
              } else {
                echo '<button id="btn" type="button" onclick="redirect2()">Log In</button>';
              }
              
            ?>
        
  
      </div>
    
      <script type="text/javascript" src="js/app.js"></script>
  </body>
</html>
