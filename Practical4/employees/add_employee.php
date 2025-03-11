<?php
require('database.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
 $name =$_REQUEST['name'];
 $age =$_REQUEST['age'];
 $department =$_REQUEST['department'];
 $salary =$_REQUEST['salary'];
 $date_hired =$_REQUEST['date_hired'];
 $description = $_REQUEST['description'];
 $ins_query="INSERT INTO `employees`(`name`, `age`, `department`, `salary`, `date_hired`)
 VALUES ('".$name."','".$age."','".$department."','".$salary."','"$date_hired"')";
 mysqli_query($con,$ins_query)
 or die(mysqli_error($con));
 $status = "New Category Inserted Successfully.
 </br></br><a href='view.php'>View Category Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<body>
    <h1>Insert New Employee</h1>
    <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />
        
        <p><input type="text" name="name" placeholder="Enter Employee Name" required /></p>
        <p><input type="number" name="age" placeholder="Enter Age" required /></p>
        <p><input type="text" name="department" placeholder="Enter Department" required /></p>
        <p><input type="number" name="salary" placeholder="Enter Salary" required /></p>
        <p><input type="date" name="date_hired" placeholder="Enter Hiring Date" required /></p>
        
        <p><input name="submit" type="submit" value="Submit" /></p>
    </form>
</body>
</html>