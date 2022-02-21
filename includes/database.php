<?php
//Settings to connect to DB
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "phpcourse";

//Connect to DB
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

//Whether such a BD exists
if (!$conn){
  die("Sorry, can't to connect to your DB :(!");
}
?>