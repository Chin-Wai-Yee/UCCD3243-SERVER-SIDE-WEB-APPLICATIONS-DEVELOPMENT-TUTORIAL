<?php
include("auth.php");
require('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brochures</title>
</head>
<body>
    <?php
    $filesQuery = "SELECT * FROM product_brochures";
    $filesResult = mysqli_query($con, $filesQuery);
    if ($filesResult) {
        echo "<table>";
        ?>
        <thead>
            <tr>
                <td>No. </td>
                <td>Product Name</td>
                <td>Brohure Description</td>
                <td>Filename</td>
                <td>Upload Date</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($fileRow = mysqli_fetch_assoc($filesResult)) {
            echo "<tr>";
            echo "<td>" . $fileRow['product_name'] . "</td>";
            echo "<td>" . $fileRow['brochure_description'] . "</td>";
            echo "<td>" . $fileRow['file_name'] . "</td>";
            echo "<td>" . $fileRow['upload_date'] . "</td>";
            echo "<td><a href='upload/" . $fileRow['filename'] . "' target='_blank'>View</a></td>";
            echo "<td><a href='file_manager.php?delete=" . $fileRow['id'] . "' onclick=\"return confirm('Are you sure you want to delete this file?')\">Delete</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    ?>
</body>
</html>
