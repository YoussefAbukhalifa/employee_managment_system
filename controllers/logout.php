<?php
session_start(); // Start the session

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a login page or any other page after logging out
header("Location: ../views/auth/login.php");
exit;
?>
