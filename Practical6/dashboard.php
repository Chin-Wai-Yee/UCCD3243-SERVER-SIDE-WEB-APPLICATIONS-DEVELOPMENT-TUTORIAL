<?php
include("auth.php");
require('database.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Secured Page</title>
</head>

<body>
    <div class="form">
        <p>User Dashboard</p>
        <p>Access Granted - This page is protected.</p>
        <p><a href="index.php">Home</a></p>
        <p><a href="insert.php">Insert New Product</a></p>
        <p><a href="view.php">View Product Records</a></p>
        <p><a href="view_search.php">Search Product Records</a></p>
        <p><a href="view_category.php">Category Records</a></p>
        <p><a href="file_manager.php">Upload File</a></p>
        <p><a href="view_brochures.php">View Brochure</a></p>
        <p><a href="user_profile.php"> Add New User Information </a></p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>