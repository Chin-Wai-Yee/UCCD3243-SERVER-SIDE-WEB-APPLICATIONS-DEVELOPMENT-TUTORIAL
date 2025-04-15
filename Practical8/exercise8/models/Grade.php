<?php
require_once __DIR__ . "/../config.php";
class Grade
{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function getGrades()
    {
        if (!$this->con) {
            die("Database connection is missing.");
        }
        $query = "SELECT * FROM grades ORDER BY created_at DESC";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            die("Database query failed: " . mysqli_error($this->con));
        }
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addGrade($student_name, $subject, $score, $grade)
    {
        if (!$this->con) {
            die("Database connection is missing.");
        }
        $student_name = mysqli_real_escape_string($this->con, $student_name);
        $subject = mysqli_real_escape_string($this->con, $subject);
        $score = mysqli_real_escape_string($this->con, $score);
        $grade = mysqli_real_escape_string($this->con, $grade);

        $query = "INSERT INTO grades (student_name, subject, score, grade)
            VALUES ('$student_name', '$subject', '$score', '$grade')";

        error_log($query);

        if (!mysqli_query($this->con, $query)) {
            die("Insert query failed: " . mysqli_error($this->con));
        }
        return true;
    }
}
?>
