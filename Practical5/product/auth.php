<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// timeout function
$timeout_duration = 600;
// Check if the session 'last_activity' timestamp exists
if (isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];
    if ($elapsed_time > $timeout_duration) {
        session_unset();
        session_destroy();
        header('Location: login.php?session_expired=1');
        exit();
    }
}
// Update the last activity time
$_SESSION['last_activity'] = time();
?>