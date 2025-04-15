<?php include __DIR__ . "/header.php"; ?>
<h2>Add a Task</h2>
<?php if (isset($_GET["success"]) && $_GET["success"] == 1): ?>
 <p style="color: green; font-weight: bold; text-align: center;">Task successfully
added!</p>
<?php endif; ?><form method="POST" action="../controllers/GradeController.php">
 <label>Student Name:</label>
 <input type="text" name="student_name" required><br>
 <label>Subject:</label>
 <textarea name="subject" required></textarea><br>
 <label>Score:</label>
 <input type="number" name="score" min="0" max="100" required>
 <label>Grade:</label>
 <input type="text" name="grade" required>
 <input type="submit" name="submit" value="Add Task">
</form>
<?php include __DIR__ . "/footer.php"; ?>
