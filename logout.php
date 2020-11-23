<?php 
session_start();
include ('connection.php');
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['role']);
$_SESSION["success"]="Successfully Logout.";
header('Location:index.php');

?>