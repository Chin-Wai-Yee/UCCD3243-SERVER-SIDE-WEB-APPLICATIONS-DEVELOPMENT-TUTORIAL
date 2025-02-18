<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekday Checker</title>
</head>
<body>
    <form method="post">
        <label for="weekday">Enter a weekday</label>
        <input type="number" name="weekday" id="weekday">
        <button type="submit">Check</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weekday = $_POST["weekday"];
        if ($weekday <= 0 || $weekday > 7) {
            echo "<p>Value out of range!</p>";
        }
        else {
            $weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
            echo '<p>' . $weekdays[$weekday - 1] . '</p>';
        }
    }
    ?>
</body>
</html>