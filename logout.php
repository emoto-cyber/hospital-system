<?php
session_start();//access the current session
// If no session id variable exists, redirect the user
if (!isset($_SESSION['email'])&&($_SESSION['user_level'])) {
header("location:index.php");
exit();
}else{ //Destroy the session
 session_destroy(); // Destroy the session itself
header("location:index.php");
exit();
}