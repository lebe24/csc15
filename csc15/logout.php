<?php 
session_start();

if (isset($_POST["logout"])){
session_destroy();
session_unset($_SESSION["user_name"]);
header("Location: index.php");

};

?>