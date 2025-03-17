<?php
include("auth.php");
require('database.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
 $product_name =$_REQUEST['product_name'];
 $price = $_REQUEST['price'];
 $quantity = $_REQUEST['quantity'];
 $date_record = date("Y-m-d H:i:s");
 $submittedby = $_SESSION["username"];
 $ins_query="INSERT into products
 (`product_name`,`price`,`quantity`,`date_record`,`submittedby`)values
 ('$product_name','$price','$quantity','$date_record','$submittedby')";
 mysqli_query($con,$ins_query)
 or die(mysqli_error($con));
 $status = "New Product Inserted Successfully.
 </br></br><a href='view.php'>View Product Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Product</title>
</head>
<body>
<p><a href="dashboard.php">User Dashboard</a>
| <a href="view.php">View Product Records</a>
| <a href="logout.php">Logout</a></p>
<h1>Insert New Product</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<p><input type="text" name="product_name" placeholder="Enter Product Name"
required /></p>
<p><input type="number" name="price" step="0.01" min="0" placeholder="Enter
Product Price (RM)" required /></p>
<p><input type="number" name="quantity" placeholder="Enter Product Quantity"
required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#008000;"><?php echo $status; ?></p>
</body>
</html>