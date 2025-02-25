<?php
$name = $_POST['name'] ?? 'Unknown';
$age = $_POST['age'] ?? 'Unknown';
echo "<h1>User Information</h1>";
echo "Name: " . htmlspecialchars($name) . "<br>";
echo "Age: " . htmlspecialchars($age) . "<br>";
echo "<h2>Server Information</h2>";
echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Page Accessed: " . $_SERVER['PHP_SELF'] . "<br>";
?>