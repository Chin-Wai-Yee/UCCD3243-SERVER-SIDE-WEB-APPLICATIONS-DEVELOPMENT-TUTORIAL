<?php
$con = mysqli_connect("localhost", "root", "", "ajax_demo");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if ($_GET["action"] === "display") {

        $sql = "SELECT users.name, user_activity.last_seen,
            TIMESTAMPDIFF(MINUTE, user_activity.last_seen, NOW()) AS inactive_time
            FROM user_activity
            INNER JOIN users ON users.id = user_activity.user_id";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) <= 0) {
            echo "<td colspan=2>No records found!</td>";
        }
        
        while ($row = mysqli_fetch_assoc($result)) {
            $status = ($row['inactive_time'] <= 5) ? "<span class='online'>Online</span>" : "<span class='offline'>Offline</span>";
            echo "<tr>
                <td>{$row["name"]}</td>
                <td>{$status}</td>
                </tr>";
        }
    }
}
?>