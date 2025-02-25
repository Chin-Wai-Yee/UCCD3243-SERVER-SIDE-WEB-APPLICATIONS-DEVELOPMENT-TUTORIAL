<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table</title>
</head>
<body>
    <h1>Multiplication Table</h1>
    <p>Range: Specify the starting and ending numbers.</p>
    <?php
        $start = 1; // Set the starting number
        $end = 10; // Set the ending number

        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>*</th>";

        for ($i = $start; $i <= $end; $i++) {
            echo "<th>$i</th>";
        }
        echo "</tr>";
        for ($i = $start; $i <= $end; $i++) {
            echo "<tr>";
            echo "<th>$i</th>";
            for ($j = $start; $j <= $end; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        for ($i = 0; $i <= $end; $i++) {
            for ($j = $start; $j <= $i; $j++) {
                echo "<p>" . $i . " x " . $j . " = " . ($i * $j) . "</p>";
            }
        }
    ?>
</body>
</html>
