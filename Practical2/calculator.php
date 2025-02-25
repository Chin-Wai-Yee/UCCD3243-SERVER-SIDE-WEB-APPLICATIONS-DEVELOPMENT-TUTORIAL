<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <?php
    $item_price = 49.99;
    $quantity = 3;
    $discount_rate = 0.1;
    $tax_rate = 0.07;

    $subtotal = $item_price * $quantity;
    $discount = $subtotal * $discount_rate;
    $tax = ($subtotal - $discount) * $tax_rate;
    $final_total = $subtotal - $discount + $tax;
    echo "<h1>Summary Calculation</h1>";
    echo "<p>Item Price: RM$item_price</p>";
    echo "<p>Quantity: $quantity</p>";
    echo "<p>Subtotal: RM" . number_format($subtotal, 2) . "</p>";
    echo "<p>Discount: -RM" . number_format($discount, 2) . "</p>";
    echo "<p>Tax: +RM" . number_format($tax, 2) . "</p>";
    echo "<p><strong>Total: RM" . number_format($final_total, 2) . "</strong></p>";
    ?>
</body>
</html>