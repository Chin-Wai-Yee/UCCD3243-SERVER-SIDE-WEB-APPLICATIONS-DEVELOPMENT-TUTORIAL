<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odd or Even Number Checker</title>
</head>
<body>
    <h1>Odd or Even Number Checker</h1>

    <form id="numberForm" method="POST">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" placeholder=114514 required>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];

        if ($number % 2 == 0) {
            echo "<p>$number is an even number.</p>";
        }
        else {
            echo "<p>$number is an odd number.</p>";
        }
        
        if ($number > 0) {
            echo "<p>$number is an positive number.</p>";
        }
        else if ($number == 0) {
            echo "<p>$number is an zero</p>";
        }
        else {
            echo "<p>$number is an negative number.</p>";
        }
    }

    ?>

    <script>
        document.getElementById("number").addEventListener("change", (e) => {
            document.getElementById("numberForm").submit();
        });
    </script>
</body>
</html>