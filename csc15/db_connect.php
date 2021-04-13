<?php 
$servername = "localhost";
$user_name = "root";
$pass_word = "";
$dbname = "login";

// Create connection
$conn = mysqli_connect($servername, $user_name, $pass_word);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>