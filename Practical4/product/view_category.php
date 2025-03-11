<?php
include("auth.php");
require('database.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Category Records</title>
</head>
<body>
<p><a href="index.php">Home Page</a></p>
| <a href="insert_category.php">Insert New Category</a>
| <a href="logout.php">Logout</a></p>
<h2>View Category Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>No.</strong></th>
<th><strong>Category Name</strong></th>
<th><strong>Description</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM category ORDER BY category_id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["description"]; ?></td>
<td align="center">
<a href="update_category.php?id=<?php echo $row["category_id"]; ?>">Update</a>
</td>
<td align="center">
<a href="delete_category.php?id=<?php echo $row["category_id"]; ?>" onclick="return confirm('Are you sure
you want to delete this product record?')">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</body>
</html>