<?php
include("auth.php");
require('database.php');
$id=$_REQUEST['id'];
$query = "SELECT * FROM category where category_id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Category Record</title>
</head>
<body>
<p><a href="dashboard.php">User Dashboard</a>
| <a href="insert_category.php">Insert New Category</a>
| <a href="logout.php">Logout</a></p>
<h1>Update Category Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1) {
    $id=$_REQUEST['id'];
    $category_name = $_REQUEST['category_name'];
    $description = $_REQUEST['description'];
    $update="UPDATE category
    set name='".$category_name."', description='".$description."' where category_id='".$id."'";
    mysqli_query($con, $update) or die(mysqli_error($con));
    $status = "Category Record Updated Successfully. </br></br>
    <a href='view_category.php'>View Updated Record</a>";
    echo '<p style="color:#008000;">'.$status.'</p>';
}else {
?>
<form name="form" method="post" action="">
    <input type="hidden" name="new" value="1" />
    <input name="id" type="hidden" value="<?php echo $row['category_id'];?>" />
    <p><input type="text" name="category_name" placeholder="Update Category Name"
    required value="<?php echo $row['name'];?>" /></p>
    <p><input type="text" name="description" placeholder="Update Category Description"
    required value="<?php echo $row['description'];?>" /></p>
    <p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</body>
</html>