<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>
<body>
    <?php
    $food = "Tuna Pizza";
    $price = 24.63;
    $quantity = 5;
    $isSpicy = true;

    ECHO "<p>The selected food item is: $food</p>";
    ECHO "<p>The price is: RM $price</p>";
    ECHO "<p>Order quantity is: $quantity</p>";
    ECHO '<p>Do you want the food to be spicy? ' . ($isSpicy? 'Yes' : 'No') . '</p>';
    ?>
</body>
</html>