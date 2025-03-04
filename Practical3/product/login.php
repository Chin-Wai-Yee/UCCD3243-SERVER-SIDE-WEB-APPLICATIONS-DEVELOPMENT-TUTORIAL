<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Login</title>
</head>
<body>
<?php
require('database.php');

if (isset($_GET['reset_success']))
{
    ?>
    <p style="color: green; font-size: 18px; font-weight: bold; text-align: center; padding: 10px; background-color: #e0f7e0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 128, 0, 0.2);">
    Password reset successful
    </p>
    <?php
  
}

if (isset($_POST['username'])){
$username = stripslashes($_REQUEST['username']);
$username = mysqli_real_escape_string($con,$username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
 $query = "SELECT *
 FROM `users`
 WHERE username='$username'
 AND password='".md5($password)."'"
 ;
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$rows = mysqli_num_rows($result);
 if($rows==1){
 $_SESSION['username'] = $username;

 header("Location: index.php");
 exit();
 }else{
echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
}
 }else{
?>
<div class="form">
<h1>User Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
<p>I <a href='forgot_password.php'>forgot my password</a></p>
</div>
<?php } ?>
</body>
</html>