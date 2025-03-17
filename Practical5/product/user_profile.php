<?php
include("auth.php");
require('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['full_name'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $userId = $_SESSION['user_id'] ?? 0;
    $insertQuery = "INSERT INTO user_profile (full_name, address, phone, user_id)
VALUES ('$fullName', '$address', '$phone', $userId)";
    if (!mysqli_query($con, $insertQuery)) {
        die("Error: " . mysqli_error($con));
    } else {
        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add New User Information </title>
</head>

<body>
    <div class="form">
        <h1>Example: Add New User Information</h1>
        <form action="" method="post" name="user_profile">
            <input type="text" name="full_name" placeholder="Full Name" required /><br>
            <input type="text" name="address" placeholder="Address" required /><br>
            <input type="text" name="phone" placeholder="Phone" required /><br>
            <input name="submit" type="submit" value="Add Detail Profile" />
        </form>
        <p><a href='dashboard.php'>Back to Dashboard</a></p>
    </div>
</body>

</html>