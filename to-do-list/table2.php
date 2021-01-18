<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "to_do_list";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT `list_id`, name, `users-id` FROM `list` "; // we select every tables from the database 
//SELECT * FROM `todos` WHERE 1
$result = mysqli_query($conn, $sql); //we perfom a query on the database ?

if (mysqli_num_rows($result) > 0) { //we create a table
  // output data of each row
	echo '<table>';
	echo '<tr>';
          echo '<th>List-id</th>';
          echo '<th>Name</th>';
          echo '<th>User-id</th>';
 


	echo '</tr>';
  while($row = mysqli_fetch_assoc($result)) { //we print our values from the database
            echo '<tr>';
            echo "<td>". $row["list_id"]."</td>";
            echo "<td>". $row["name"]."</td>";
            echo "<td>". $row["users-id"]."</td>";
  
  
  	echo '</tr>';

  }
  echo '<table>';
 }
 else {
   echo 'No data in list';
 }