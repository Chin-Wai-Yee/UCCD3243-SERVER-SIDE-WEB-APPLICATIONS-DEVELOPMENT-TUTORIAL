<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
</head>
<body>
    <form method="post">
        <label for="email">Enter your email: </label>
        <input type="email" name="email" id="email" placeholder="abc@example.com">
        <button type="submit">Reset password</button>
    </form>
</body>
</html>

<?php
require('database.php');
if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_user = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check_user) > 0) {
        $token = bin2hex(random_bytes(50));
        mysqli_query($con, "INSERT INTO password_resets (email, token) VALUES
        ('$email', '$token')");
        echo "<p>Password reset link: <a href='reset_password.php?token=$token'>Reset
        Password</a></p>";
    } else {
        echo "<p>Email not found.</p>";
    }
}
?>