<?php
include("auth.php");
require('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Brochure</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        <br>
        <input type="file" name="brochure" id="brochure">
        <button type="submit">Upload</button>
    </form>
</body>
</html>