<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "userinfo";
// Create connection
$connection = mysqli_connect($servername, $username, $password,$database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
//echo "Connected successfully";
?>