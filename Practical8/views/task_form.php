<?php include __DIR__ . "/header.php"; ?>
<h2>Add a Task</h2>
<?php if (isset($_GET["success"]) && $_GET["success"] == 1): ?>
 <p style="color: green; font-weight: bold; text-align: center;">Task successfully
added!</p>
<?php endif; ?><form method="POST" action="../controllers/TaskController.php">
 <label>Title:</label>
 <input type="text" name="title" required><br>
 <label>Description:</label>
 <textarea name="description" required></textarea><br>
 <label>Status:</label>
 <select name="status">
 <option value="Pending">Pending</option>
 <option value="In Progress">In Progress</option>
 <option value="Completed">Completed</option>
 </select><br>
 <input type="submit" name="submit" value="Add Task">
</form>
<?php include __DIR__ . "/footer.php"; ?>
