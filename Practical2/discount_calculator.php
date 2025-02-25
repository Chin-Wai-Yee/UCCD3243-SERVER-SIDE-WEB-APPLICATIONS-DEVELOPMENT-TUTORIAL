<?php
$name = $_POST["customerName"];
$age = $_POST["customerAge"];
$amount = $_POST["amountSpent"];

if ($age >= 60) {
    $category = "Senior";
    $discount = $amount * 0.20;
} elseif ($age > 0) {
    $category = "Regular";
    $discount = $amount * 0.10;
} else {
    $category = "New";
    $discount = 0;
}

$finalAmount = $amount - $discount;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Visit Result</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    .result-container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

  <div class="result-container">
    <h2 class="text-center mb-4">Customer Visit Result</h2>
    <div class="mb-3">
      <strong>Name:</strong> <?php echo htmlspecialchars($name); ?>
    </div>
    <div class="mb-3">
      <strong>Age:</strong> <?php echo htmlspecialchars($age); ?>
    </div>
    <div class="mb-3">
      <strong>Amount Spent ($):</strong> $<?php echo number_format($amount, 2); ?>
    </div>
    <div class="mb-3">
      <strong>Category:</strong> <?php echo $category; ?>
    </div>
    <div class="mb-3">
      <strong>Discount ($):</strong> $<?php echo number_format($discount, 2); ?>
    </div>
    <div class="mb-3">
      <strong>Final Amount ($):</strong> $<?php echo number_format($finalAmount, 2); ?>
    </div>
    <div class="d-grid">
      <a href="discount_form.html" class="btn btn-secondary">Go Back</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>