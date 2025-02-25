<?php
    $name = $_GET['name'] ?? '';
    $age = $_GET['age'] ?? 0;
    $email = $_GET['email'] ?? '';
    $gender = isset($_GET['gender']) ? $_GET['gender'] : "";
    $interests = isset($_GET['interests']) ? $_GET['interests'] : [];
    echo "User Information (GET Method):<br>";
    echo "Name: $name<br>";
    echo "Age: $age<br>";
    echo "Email: $email<br>";
    echo "Gender: $gender<br>";
    echo "Interests: " . implode(", ", $interests) . "<br>";
?>