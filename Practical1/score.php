<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade</title>
</head>
<body>
    <h1>Student Grade</h1>

    <?php
    $score = 75;
    echo "<p>Student's Score: " . $score . "</p>";
    echo "<p>Grade: ";
    switch (true) {
        case ($score >= 80):
            echo 'A';
            break;
        case ($score >= 70):
            echo 'B';
            break;
        case ($score >= 50):
            echo 'C';
            break;
        case ($score >= 40):
            echo 'D';
            break;
        default:
            echo 'F';
    }
    ?>
</body>
</html>