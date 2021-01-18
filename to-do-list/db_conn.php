<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name ="to_do_list";

try{
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", //We are using the PDO to be connected to the database
                    $uName, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Connection failed : ". $e->getMessage();
}

