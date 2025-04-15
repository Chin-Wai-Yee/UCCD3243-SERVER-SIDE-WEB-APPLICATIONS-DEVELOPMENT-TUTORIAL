<?php
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../models/Task.php";
global $con;
$taskModel = new Task($con);
$tasks = $taskModel->getTasks();
include __DIR__ . "/header.php";
?>
<h2>Task List</h2>
<?php if (!empty($tasks)): ?>
<table>
 <tr>
 <th>ID</th>
 <th>Title</th>
 <th>Description</th>
 <th>Status</th>
 <th>Created At</th>
 </tr>
 <?php foreach ($tasks as $task): ?>
 <tr><td><?php echo $task["id"]; ?></td>
 <td><?php echo $task["title"]; ?></td>
 <td><?php echo $task["description"]; ?></td>
 <td><?php echo $task["status"]; ?></td>
 <td><?php echo $task["created_at"]; ?></td>
 </tr>
 <?php endforeach; ?>
</table>
<?php else: ?>
 <p>No tasks found. Please add some tasks.</p>
<?php endif; ?>
<?php include __DIR__ . "/footer.php"; ?>
