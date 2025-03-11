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
    <h2>Search Product Records</h2>
    <?php
    $search = $_GET['search'] ?? '';
    $min_price = $_GET['min_price'] ?? '';
    $max_price = $_GET['max_price'] ?? '';
    ?>
    <form method="GET" action="view_search.php">
        <input type="text" name="search" placeholder="Enter exact product name"
        value="<?php echo $search; ?>">

        <label>Min Price:</label>
        <input type="number" name="min_price" value="<?php echo $min_price; ?>"
        step="0.01">

        <label>Max Price:</label>
        <input type="number" name="max_price" value="<?php echo $max_price; ?>"
        step="0.01">

        <button type="submit">Search & Filter</button>
        <button type="button"
        onclick="window.location.href='view_search.php'">Reset</button>
    </form>
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
            $sel_query = "SELECT * FROM products WHERE 1";
            if (!empty($search)) {
                $sel_query .= " AND product_name LIKE '%$search%'";
            }
            if (!empty($min_price) && is_numeric($min_price) && !empty($max_price) &&
            is_numeric($max_price)) {
                $sel_query .= " AND price BETWEEN $min_price AND $max_price";
            }
            $sel_query .= " ORDER BY id DESC";
            $result = mysqli_query($con, $sel_query);
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