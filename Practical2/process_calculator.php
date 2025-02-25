<?php
$num1 = $_GET['num1'] ?? 0;
$num2 = $_GET['num2'] ?? 0;
$operation = $_GET['operation'] ?? 'add';
switch ($operation) {
    case 'add':
        $result = $num1 + $num2;
        $operationName = "Addition";
        break;
    case 'subtract':
        $result = $num1 - $num2;
        $operationName = "Subtraction";
        break;
    case 'multiply':
        $result = $num1 * $num2;
        $operationName = "Multiplication";
        break;
    case 'divide':
        $result = ($num2 != 0) ? ($num1 / $num2) : 'Division by zero error';
        $operationName = "Division";
        break;
    default:
        $result = "Invalid operation";
        $operationName = "Unknown";
}
echo "<h1>Calculator Result</h1>";
echo "Operation: $operationName<br>";
echo "Number 1: $num1<br>";
echo "Number 2: $num2<br>";
echo "Result: $result<br>";
?>