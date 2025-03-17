<?php
include("auth.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['mode'])) {
    $_SESSION['theme_mode'] = $_POST['mode'];
    $user_id = $_SESSION['user_id'];
    $theme_mode = $_SESSION['theme_mode'];
    $update_query = "UPDATE users SET theme_mode='$theme_mode' WHERE id='$user_id'";
    mysqli_query($con, $update_query);
    header("Location: index.php");
    exit();
}
if (!isset($_SESSION['theme_mode'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT theme_mode FROM users WHERE id='$user_id'";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['theme_mode'] = $row['theme_mode'];
    } else {
        $_SESSION['theme_mode'] = 'light';
    }
}
$theme_mode = $_SESSION['theme_mode'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome to Home Page</title>
    <style>
        body {
            background-color:
                <?php echo ($theme_mode == 'dark') ? '#222' : '#fff'; ?>
            ;
            color:
                <?php echo ($theme_mode == 'dark') ? '#fff' : '#000'; ?>
            ;
            text-align: center;
            padding: 20px;
        }

        .toggle-btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            background-color:
                <?php echo ($theme_mode == 'dark') ? '#444' : '#ddd'; ?>
            ;
            color:
                <?php echo ($theme_mode == 'dark') ? '#fff' : '#000'; ?>
            ;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="form">
        <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
        <?php
        if (isset($_COOKIE["user"])) {
            $cookie_value = $_COOKIE["user"];
            echo "Welcome, " . $cookie_value . ". Your cookie is now set.";
        } else {
            echo "Cookie is not set!";
        }

        ?>
        <form method="post">
            <?php $next_theme = $theme_mode == "light" ? "dark" : "light" ?>
            <input type="hidden" name="mode" value="<?php echo $next_theme ?>">
            <button class="toggle-btn" type="submit">Switch to <?php echo $next_theme ?> mode</button>
        </form>
        <?php

        ?>
        <p><a href="delete_cookie.php">Delete Cookie</a></p><br>
        <p>This is secure area.</p><br>
        <p><a href="dashboard.php">User Dashboard</a></p><br>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>