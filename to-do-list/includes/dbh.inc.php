<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "to_do_list";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName); //function to be connected to the databse, we are using MSQLi

if (!$conn) { //if shtg is wrong, we print the error
	die("Connection failed: ".mysqli_connect_error());
}

//echo "Connected successfully";