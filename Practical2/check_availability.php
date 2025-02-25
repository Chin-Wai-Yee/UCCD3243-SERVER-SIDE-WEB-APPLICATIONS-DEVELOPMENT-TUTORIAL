<?php
    $book_titles = array("PHP Basics", "Web Development", "Database Design");
    $book_title = $_GET["title"];
    if (in_array($book_title, $book_titles)) {
        echo "<p>$book_title is available!</p>";
    }
    else {
        echo "<p>$book_title is not available!</p>";
    }
?>