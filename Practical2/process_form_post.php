<?php
    $username = $_POST['username'] ?? '';
    $pswd = $_POST['pswd'] ?? '';
    $address = $_POST['address'] ?? '';
    $plan = $_POST['plan'] ?? '';
    echo "User Inquiry (POST Method):<br>";
    echo "Username: $username<br>";
    echo "Password: $pswd<br>";
    echo "Address: $address<br>";
    echo "Internet Plan: $plan";
?>