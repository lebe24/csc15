<!Doctype html>
<?php 

session_start();

//function to filter our input
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//get values passed from index.html
$username = validate($_POST["user_name"]);
$password = validate($_POST["user_password"]);
  
//connect database
require 'dash/db_connect.php';
mysqli_select_db($conn,$dbname);

//query database
$sql = "SELECT * FROM `users` WHERE `username`='".$username."' AND `password`='".$password."' ";
//echo "<pre>Debug: $sql</pre>\m";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if(($row["username"] == $username && $row["password"] == $password) && $row["position"] == 'Employer'){
    // echo "Login succesful";
    ?><html><script>alert('welcome <?php echo $username ?>');</script></html><?php
     header("Location: dash/dash_worker.php"); //employee page
 } else if(($row["username"] == $username && $row["password"] == $password) && $row["position"] == 'HR'){
     ?><html><script>alert('welcome <?php echo $username ?>');</script></html><?php
     header("Location: dash/dash_hr.php"); // HR page
 }else if(($row["username"] == $username && $row["password"] == $password) && $row["position"] == 'Manager'){
     ?><html><script>alert('welcome <?php echo $username ?>');</script></html><?php
     header("Location: dash/dash_mg.php"); // Manager page
 }else {
     ?><html><script>alert('Login Unsuccesful');</script></html><?php
     include 'index.html'; // goes back to the home page, because login is unsuccesful
 }

mysqli_close($conn);
?>