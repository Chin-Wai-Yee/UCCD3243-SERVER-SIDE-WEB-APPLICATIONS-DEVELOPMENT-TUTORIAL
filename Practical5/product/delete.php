<?php
require('database.php');
$id=$_GET['id'];
$query = "DELETE FROM products WHERE id=$id";
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
header("Location: view.php");
exit();
?>