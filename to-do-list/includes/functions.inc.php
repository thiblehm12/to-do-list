<?php

// Check for empty input signup
function emptyInputSignup($email, $username, $pwd) {
	$result;
	if (empty($email) || empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid username
function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid email
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


// Check if username is in database, if so then return data
function uidExists($conn, $username) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);  //Initializes a statement and returns an object for use with mysqli_stmt_prepare
	if (!mysqli_stmt_prepare($stmt, $sql)) {// Prepare an SQL statement for execution
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email); //Binds variables to a prepared statement as parameters
	mysqli_stmt_execute($stmt); //Executes a prepared Query

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt); 

	if ($row = mysqli_fetch_assoc($resultData)) { //Fetch a result row as an associative array
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt); //Closes a prepared statement
}



// Insert new user into database
function createUser($conn, $username, $email, $pwd) {
  $sql = "INSERT INTO users (usersUid, usersEmail, usersPwd) VALUES (?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);//Initializes a statement and returns an object for use with mysqli_stmt_prepare 
	if (!mysqli_stmt_prepare($stmt, $sql)) { // if the sql stmt isn't executed
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //hashed the pwd

	mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd); //Binds variables to a prepared statement as parameters
	mysqli_stmt_execute($stmt); //Executes a prepared Query
	mysqli_stmt_close($stmt); //Closes a prepared statement
	mysqli_close($conn); //Closes the function
	header("location: ../signup.php?error=none");
	exit();
}

// Check for empty input login
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Log user into website
function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username);

	if ($uidExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed); 

	if ($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		header("location: ../index.php?error=none");
		exit();
	}
}
