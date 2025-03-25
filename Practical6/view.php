<?php
include("auth.php");
require('database.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Product Records</title>
</head>
<body>
<p><a href="index.php">Home Page</a></p>
| <a href="insert.php">Insert New Product</a>
| <a href="logout.php">Logout</a></p>
<h2>View Product Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>No.</strong></th>
<th><strong>Product Name</strong></th>
<th><strong>Product Price</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Date and Time Recorded</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM products ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
$currencySymbol = "RM";
while($row = mysqli_fetch_assoc($result)) {
?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["product_name"]; ?></td>
<td align="center"><?php echo $currencySymbol . $row["price"]; ?></td>
<td align="center"><?php echo $row["quantity"]; ?></td>
<td align="center"><?php echo $row["date_record"]; ?></td>
<td align="center">
<a href="update.php?id=<?php echo $row["id"]; ?>">Update</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure
you want to delete this product record?')">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</body>
</html>