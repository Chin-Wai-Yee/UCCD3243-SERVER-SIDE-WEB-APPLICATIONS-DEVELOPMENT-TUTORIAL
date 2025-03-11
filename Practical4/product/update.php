<?php
include("auth.php");
require('database.php');
$id=$_REQUEST['id'];
$query = "SELECT * FROM products where id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Product Record</title>
</head>
<body>
<p><a href="dashboard.php">User Dashboard</a>
| <a href="insert.php">Insert New Product</a>
| <a href="logout.php">Logout</a></p>
<h1>Update Product Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
    $id=$_REQUEST['id'];
    $product_name =$_REQUEST['product_name'];
    $price = str_replace('RM ', '', $_REQUEST['price']);
    $quantity =$_REQUEST['quantity'];
    $date_record = date("Y-m-d H:i:s");
    $submittedby = $_SESSION["username"];
    $update="UPDATE products set date_record='".$date_record."',
    product_name='".$product_name."', price='".$price."', quantity='".$quantity."',
    submittedby='".$submittedby."' where id='".$id."'";
    mysqli_query($con, $update) or die(mysqli_error($con));
    $status = "Product Record Updated Successfully. </br></br>
    <a href='view.php'>View Updated Record</a>";
    echo '<p style="color:#008000;">'.$status.'</p>';
}
else { ?>
    <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="product_name" placeholder="Update Product Name"
        required value="<?php echo $row['product_name'];?>" /></p>
        <p><input type="text" name="price" placeholder="Update Product Price"
        required value="RM <?php echo $row['price'];?>" /></p>
        <p><input type="text" name="quantity" placeholder="Update Product Quantity"
        required value="<?php echo $row['quantity'];?>" /></p>
        <p><input name="submit" type="submit" value="Update" /></p>
    </form>
<?php } ?>
</body>
</html>