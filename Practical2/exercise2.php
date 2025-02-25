<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2</title>
</head>
<body>
    <?php
    $x = 25;
    $y = 3;

    $exponentiation = pow($x, $y);
    $square_root = sqrt($x);
    $percentage = ($x / $y) * 100;
    $modulus = $x % $y;

    echo "<p>x = $x</p>";
    echo "<p>y = $y</p>";
    echo "<p>exponentiation = $exponentiation</p>";
    echo "<p>square_root = $square_root</p>";
    echo "<p>percentage = $percentage</p>";
    echo "<p>modulus = $modulus</p>";

    ?>
</body>
</html>