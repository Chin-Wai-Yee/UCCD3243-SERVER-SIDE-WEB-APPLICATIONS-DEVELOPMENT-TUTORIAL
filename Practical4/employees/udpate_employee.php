<?php
require('database.php');
$id=$_REQUEST['id'];
$query = "SELECT * FROM employees where id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Employee Record</title>
</head>
<body>
<p><a href="add_employee.php">Insert New Employee</a></p>
<h1>Update Employee Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
    $id=$_REQUEST['id'];
    $name =$_REQUEST['name'];
    $salary =$_REQUEST['salary'];
    $date_hired = date("Y-m-d H:i:s");
    $update="UPDATE products set date_hired='".$date_hired."',
    name='".$name."', price='".$price."', salary='".$salary."',
    submittedby='".$submittedby."' where id='".$id."'";
    mysqli_query($con, $update) or die(mysqli_error($con));
    $status = "Employee Record Updated Successfully. </br></br>
    <a href='view.php'>View Updated Record</a>";
    echo '<p style="color:#008000;">'.$status.'</p>';
}
else { ?>
    <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="name" placeholder="Update Employee Name"
        required value="<?php echo $row['name'];?>" /></p>
        <p><input name="age" type="hidden" value="<?php echo $row['age'];?>" /></p>
        <p><input min=0 type="number" name="age" placeholder="Update Employee Age"
        required value="<?php echo $row['name'];?>" /></p>
        <p><input name="department" type="hidden" value="<?php echo $row['department'];?>" /></p>
        <p><input type="text" name="name" placeholder="Update Employee Department"
        required value="<?php echo $row['name'];?>" /></p>
        <p><input type="text" name="salary" placeholder="Update Employee Salary"
        required value="<?php echo $row['salary'];?>" /></p>
        <p><input name="submit" type="submit" value="Update" /></p>
    </form>
<?php } ?>
</body>
</html>