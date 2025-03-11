<?php
require('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees</title>
</head>
<body>
    <p><a href="add_employee.php">Add New Employee</a></p>
    <table>
        <thead>
            <th>No. </th>
            <th>Name</th>
            <th>Age</th>
            <th>Department</th>
            <th>Salary</th>
        </thead>
        <tbody>
        <?php
        $count=1;
        $sel_query="SELECT * FROM employees ORDER BY id desc;";
        $result = mysqli_query($con, $sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo $row["name"]; ?></td>
                <td align="center"><?php echo $row["age"]; ?></td>
                <td align="center"><?php echo $row["department"]; ?></td>
                <td align="center"><?php echo $row["salary"]; ?></td>
                <td align="center">
                    <a href="update_employee.php?id=<?php echo $row["id"]; ?>">Update</a>
                </td>
                <td align="center">
                    <a href="delete_employee.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure
                    you want to delete this product record?')">Delete</a>
                </td>
            </tr>
        <?php $count++; } ?>
        </tbody>
    </table>
</body>
</html>