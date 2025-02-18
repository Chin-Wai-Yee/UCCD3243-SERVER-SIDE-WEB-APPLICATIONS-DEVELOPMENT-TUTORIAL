<?php
session_start();

// Unset the 'username' session variable
unset($_SESSION['username']);

// Redirect to the login page
header("Location: login.php");
exit();
