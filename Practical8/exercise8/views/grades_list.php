<?php
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../models/Grade.php";
global $con;
$gradeModel = new Grade($con);
$grades = $gradeModel->getGrades();
include __DIR__ . "/header.php";
?>
<h2>Grade List</h2>
<?php if (!empty($grades)): ?>
<table>
 <tr>
 <th>ID</th>
 <th>Student Name</th>
 <th>Subject</th>
 <th>Score</th>
 <th>Grade</th>
 <th>Created At</th>
 </tr>
 <?php foreach ($grades as $grade): ?>
 <tr><td><?php echo $grade["id"]; ?></td>
 <td><?php echo $grade["student_name"]; ?></td>
 <td><?php echo $grade["subject"]; ?></td>
 <td><?php echo $grade["score"]; ?></td>
 <td><?php echo $grade["grade"]; ?></td>
 <td><?php echo $grade["created_at"]; ?></td>
 </tr>
 <?php endforeach; ?>
</table>
<?php else: ?>
 <p>No grades found. Please add some grades.</p>
<?php endif; ?>
<?php include __DIR__ . "/footer.php"; ?>
