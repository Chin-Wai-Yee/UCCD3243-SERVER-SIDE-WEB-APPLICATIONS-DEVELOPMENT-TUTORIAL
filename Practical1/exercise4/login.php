<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user is in the session array
    if (isset($_SESSION['users'])) {
        $user = null;
        foreach ($_SESSION['users'] as $u) {
            if ($u['username'] === $username && $u['password'] === $password) {
                $user = $u;
                break;
            }
        }

        if ($user) {
            $_SESSION['username'] = $username; // Start session
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid username or password.";
        }
    } else {
        $error_message = "No users registered yet.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>

    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>

    <br>
    <a href="register.php"><button type="button">Register</button></a>
</body>
</html>
