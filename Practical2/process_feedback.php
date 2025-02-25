<?php
    $name = $_POST['name'] ?? '';
    $feedback = $_POST['feedback'] ?? '';
    echo "Thank you, $name, for your feedback: \"$feedback\".<br>";
    echo "To review submitted feedbacks, use this link:<br>";
    echo "<a href='view_feedback.php?name=" . urlencode($name) . "'>View Feedback</a>";
?>