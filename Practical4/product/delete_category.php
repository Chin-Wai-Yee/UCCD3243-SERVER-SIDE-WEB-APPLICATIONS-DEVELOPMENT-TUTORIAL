<?php
require('database.php');
$id=$_GET['id'];
$query = "DELETE FROM category WHERE category_id=$id";
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
header("Location: view_category.php");
exit();
?>