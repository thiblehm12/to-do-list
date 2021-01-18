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

$sql = "SELECT id, title, date_time, checked, `list-id` FROM todos  "; // we select every tables from the database 
//SELECT * FROM `todos` WHERE 1
$result = mysqli_query($conn, $sql); //we perfom a query on the database ?


if (mysqli_num_rows($result) > 0) { //Returns the number of rows in $result 
;
	echo '<table>';
	echo '<tr>';
          echo '<th>Id</th>';
          echo '<th>Title</th>';
          echo '<th>Date</th>';
          echo '<th>Checked</th>';
          echo '<th>List-id</th>';


	echo '</tr>';
  while($row = mysqli_fetch_assoc($result)) { //we Fetch a result row as an associative array
          echo '<tr>';
          echo "<td>". $row["id"]."</td>";
          echo "<td>". $row["title"]."</td>";
          echo "<td>". $row["date_time"]."</td>";
          echo "<td>". $row["checked"]."</td>";
          echo "<td>". $row["list-id"]."</td>";
  
  	echo '</tr>';

  }
  echo '<table>';
 }
 else {
   echo 'No data in list';
 }
 $sql = "SELECT `list_id`, name, `users-id` FROM `list` ";
 //SELECT * FROM `todos` WHERE 1
 $result = mysqli_query($conn, $sql);
 
 if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo '<table>';
   echo '<tr>';
           echo '<th>List-id</th>';
           echo '<th>Name</th>';
           echo '<th>User-id</th>';
  
 
 
   echo '</tr>';
   while($row = mysqli_fetch_assoc($result)) {
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