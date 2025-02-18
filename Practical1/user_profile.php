<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile Summary</h1>
    
    <?php

    echo "<p>Registration Date: " . date("Y-m-d H:i:s") . "</p>";
    define("PLATFORM_NAME", "My PHP Learning Platform");
    echo "<p>Welcome to " . PLATFORM_NAME . "</p>";

    $storedUsername = "HarryPotter";
    $inputUsername = "harrypotter";
    if (strcasecmp($storedUsername, $inputUsername) == 0) {
        echo "<p>Username validated successfully.</p>";
    }
    else {
        echo "<p>Username validation failed.</p>";
    }

    $isProfileComplete = true;
    if ($isProfileComplete) {
        echo "<p>Your profile is complete. You are ready to explore more features!</p>";
    } else {
        echo "<p>Please complete your profile to access more features.</p>";
    }

    $firstName = "Harry";
    $lastName = "Potter";
    $fullName = $firstName . " " . $lastName;
    $nameLength = strlen($fullName);
    echo "<p>Full Name: $fullName</p>";
    echo "<p>Length of Full Name: $nameLength characters</p>";


    ?>
</body>
</html>