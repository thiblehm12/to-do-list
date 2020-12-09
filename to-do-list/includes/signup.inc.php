<?php

if (isset($_POST["submit"])) {

  // First we get the form data from the URL
  
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  

  // Then we run a bunch of error handlers to catch any user mistakes we can (you can add more than I did)
  // These functions can be found in functions.inc.php

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  // Left inputs empty
  // We set the functions "!== false" since "=== true" has a risk of giving us the wrong outcome
  if (emptyInputSignup($email, $username, $pwd) !== false) {
    header("location: ../signup.php?error=emptyinput");
		exit();
  }
	// Proper username chosen
  if (invalidUid($username) !== false) {
    header("location: ../signup.php?error=invaliduid");
		exit();
  }
  // Proper email chosen
  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
		exit();
  }
  // Do the two passwords match?
  
  // Is the username taken already
  if (uidExists($conn, $username, $email) !== false) {
    header("location: ../signup.php?error=usernametaken");
		exit();
  }

  // If we get to here, it means there are no user errors

  // Now we insert the user into the database
  createUser($conn, $username, $email, $pwd);

} else {
	header("location: ../signup.php");
    exit();
}
