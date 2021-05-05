<?php session_start(); ?>

<!Doctype html>
<?php 

//function to filter our input
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

  
//connect database
require 'db_connect.php';
mysqli_select_db($conn,$dbname);

if(isset($_POST['submit'])){
   //get values passed from index.html
$username = validate($_POST["user_name"]);
$password = validate($_POST["user_password"]);

//query database
$sql = "SELECT * FROM `users` WHERE `username`='".$username."' AND `password`='".$password."' ";
$query = "SELECT `Firstname`, `Lastname` FROM `users` WHERE `username`='".$username."' AND `password`='".$password."' ";

$result = mysqli_query($conn, $query);
$names = mysqli_fetch_assoc($result);
//echo "<pre>Debug: $sql</pre>\m";
$results=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($results);

if(($row["username"] == $username && $row["password"] == $password) && $row["position"] == 'Employer'){
    $_SESSION['username'] = $username;
    $_SESSION['first_name'] =$names["Firstname"];
	$_SESSION['last_name'] =$names["Lastname"];
    $_SESSION['position'] = $row["position"];

     header("Location: dash/dash_worker.php"); //employee page

 } else if(($row["username"] == $username && $row["password"] == $password) && $row["position"] == 'HR'){
    $_SESSION['username'] = $username;
    $_SESSION['first_name'] =$names["Firstname"];
	$_SESSION['last_name'] =$names["Lastname"];
    $_SESSION['position'] = $row['position'];
    
     header("Location: dash/dash_hr.php"); // HR page

 }else if(($row["username"] == $username && $row["password"] == $password) && $row["position"] == 'Manager'){
    $_SESSION['username'] = $username;
    $_SESSION['first_name'] =$names["Firstname"];
	$_SESSION['last_name'] =$names["Lastname"];
    $_SESSION['position'] = $row['position'];

     header("Location: dash/dash_mg.php"); // Manager page
 }else {
     ?><html><script>alert('Login Unsuccesful...invalid password/username');</script></html><?php
     include 'index.html'; // goes back to the home page, because login is unsuccesful
 }

}
mysqli_close($conn);
?>