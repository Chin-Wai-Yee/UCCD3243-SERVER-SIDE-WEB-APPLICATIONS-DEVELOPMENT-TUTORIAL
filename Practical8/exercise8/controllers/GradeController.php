<?php
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../models/Grade.php";
global $con;
class gradeController
{
    private $grade;
    public function __construct($con)
    {
        $this->grade = new Grade($con);
    }
    public function displayGrades()
    {
        global $con;
        $grades = $this->grade->getGrades();
        include __DIR__ . "/../views/task_list.php";
    }
    public function addGrade()
    {
        global $con;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $student_name = $_POST["student_name"];
            $subject = $_POST["subject"];
            $score = $_POST["score"];
            $grade = $_POST["grade"];

            if ($this->grade->addGrade($student_name, $subject, $score, $grade)) {
                header("Location: ../views/grades_form.php?success=1");
                exit();
            }
        }
    }
}
if (isset($_POST["submit"])) {
    global $con;
    $gradeController = new GradeController($con);
    $gradeController->addGrade();
}
?>
