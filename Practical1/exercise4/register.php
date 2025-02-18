<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple validation: check if the username and password are not empty
    if (empty($username) || empty($password)) {
        $error_message = "Please provide both a username and password.";
    } else {
        // Store new user in session (not secure for production; would use a database in real apps)
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        // Check if the username already exists
        if (in_array($username, array_column($_SESSION['users'], 'username'))) {
            $error_message = "Username already exists!";
        } else {
            // Add new user to the session array
            $_SESSION['users'][] = ['username' => $username, 'password' => $password];
            echo "Registration successful! <a href='login.php'>Click here to login.</a>";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>

    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>

    <br>
    <a href="login.php"><button type="button">Login</button></a>
</body>
</html>
