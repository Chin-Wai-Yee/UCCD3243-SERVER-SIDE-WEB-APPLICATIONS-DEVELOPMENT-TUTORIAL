<?php
$con = mysqli_connect("localhost", "root", "", "ajax_demo");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// Continue with the next steps below for handling CRUD operations and live search...
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if ($_GET["action"] === "display") {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>{$row["name"]}</td>
            <td>{$row["email"]}</td>
            <td>
            <button onclick='editUser({$row["id"]})'>Edit</button>
            <button onclick='deleteUser({$row["id"]})'>Delete</button>
            </td>
            </tr>";
        }
    } elseif ($_GET["action"] === "search") {
        $search = $_GET["search"];
        $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE
       '%$search%'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>{$row["name"]} - {$row["email"]}</div>";
        }
    } elseif ($_GET["action"] === "getSingleUser") {
        $id = $_GET["id"];
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($con, $sql);
        echo json_encode(mysqli_fetch_assoc($result));
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] === "add") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        mysqli_query(
            $con,
            "INSERT INTO users (name, email) VALUES ('$name',
       '$email')"
        );
    } elseif ($_POST["action"] === "edit") {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        mysqli_query(
            $con,
            "UPDATE users SET name='$name', email='$email' WHERE
           id=$id"
        );
    } elseif ($_POST["action"] === "delete") {
        $id = $_POST["id"];
        mysqli_query($con, "DELETE FROM users WHERE id=$id");
    }
}
?>
